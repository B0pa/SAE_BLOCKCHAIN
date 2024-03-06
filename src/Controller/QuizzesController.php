<?php
declare(strict_types=1);

namespace App\Controller;


use Cake\Utility\Text;
use Laminas\Diactoros\UploadedFile;
use Cake\Http\Cookie\Cookie;
use Cake\Log\Log;

/**
 * Quizzes Controller
 *
 * @property \App\Model\Table\QuizzesTable $Quizzes
 */
class QuizzesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Quizzes->find();
        $quizzes = $this->paginate($query);

        $this->set(compact('quizzes'));
    }

    /**
     * View method
     *
     * @param string|null $id Quiz id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $quiz = $this->Quizzes->get($id, contain: []);
        $this->set(compact('quiz'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $quiz = $this->Quizzes->newEmptyEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            // Créer un tableau pour stocker les données des réponses
            $answersData = [];
            $answerNumber = 1; // Ajoutez un compteur ici
            foreach ($data as $key => $value) {
                if (strpos($key, 'answer') === 0) {
                    if ($data['questionform'] === 'image') {
                        /** @var UploadedFile $file */
                        $file = $value;
                        if ($file->getError() === 0 && str_contains($file->getClientMediaType(), 'image')) {
                            $newName = strtolower(Text::slug($file->getClientFilename(), ['preserve' => '.']));
                            $file->moveTo(WWW_ROOT . 'img/upload/' . $newName);
                            $value = $newName;
                        }
                    }
                    $answersData[] = ['answer' => $value, 'num' => $answerNumber]; // Ajoutez le numéro de la réponse ici
                    $answerNumber++; // Incrémentez le compteur après chaque réponse
                }
            }

            // Ajouter les données des réponses à l'entité quiz
            $data['answers'] = $answersData;

            // dd($data);
            $quiz = $this->Quizzes->newEntity($data, [
                'associated' => ['Answers']
            ]);
            // dd($quiz);
            
            if ($this->Quizzes->save($quiz, ['associated' => ['Answers']])) {
                // dd($quiz);
                // La quiz et les réponses ont été sauvegardées
                $this->Flash->success(__('The quiz has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                // La sauvegarde a échoué
                debug($quiz->getErrors());
            }
            $this->Flash->error(__('The quiz could not be saved. Please, try again.'));
        }
        $this->set(compact('quiz'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Quiz id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $quiz = $this->Quizzes->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $quiz = $this->Quizzes->patchEntity($quiz, $this->request->getData());
            if ($this->Quizzes->save($quiz)) {
                $this->Flash->success(__('The quiz has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The quiz could not be saved. Please, try again.'));
        }
        $this->set(compact('quiz'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Quiz id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $quiz = $this->Quizzes->get($id);
        if ($this->Quizzes->delete($quiz)) {
            $this->Flash->success(__('The quiz has been deleted.'));
        } else {
            $this->Flash->error(__('The quiz could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function quizzDanger()
    {
        $quizes = $this->Quizzes->find()
            ->where(['category' => 'danger'])
            ->toArray();

        $this->set(compact('quizes'));

    }

    public function quizzNFT()
    {
        $quizes = $this->Quizzes->find()
            ->where(['category' => 'nft'])
            ->toArray();

        $this->set(compact('quizes'));
    }

    public function quizzcrypto()
    {
        $quizes = $this->Quizzes->find()
            ->where(['category' => 'crypto'])
            ->toArray();

        $this->set(compact('quizes'));
    }

    public function quizzBlockchain()
    {
        $quizes = $this->Quizzes->find()
            ->contain(['Answers'])
            ->where(['category' => 'blockchain'])
            ->toArray();
    
        $this->set(compact('quizes'));
    }

    public function checkAnswersDanger() // Verification reponse danger
    {
        if ($this->request->is('post')) {
            $valide = $this->request->getCookie('validation');
            // get valeur validation
            Log::write('debug', $valide);
            if ($valide == 1) {
                $data = $this->request->getData();

                $correctAnswers = 0;

                $allQuizIds = $this->Quizzes->find('list')->toArray();

                foreach ($allQuizIds as $quizId) { // compter les bonnes reponses
                    if (isset($data['reponse'.$quizId])) {
                        $selectedAnswer = $data['reponse'.$quizId];
                        $quiz = $this->Quizzes->get($quizId);
                        if (!empty($selectedAnswer) && $quiz->realanswer == $selectedAnswer) {
                            $correctAnswers++;
                        }
                    }
                }

                $points = $correctAnswers * 100; // Calculer les points
                $cookie = $this->request->getCookie('danger');

                if ($cookie != null) {
                    // Le cookie existe, modifiez sa valeur
                    $newCookie = (new \Cake\Http\Cookie\Cookie('danger'))
                        ->withValue($points) // Ajoutez 500 à la valeur actuelle
                        ->withExpiry(new \DateTime('+1 day')); // Définissez l'expiration à 1 jour à partir de maintenant
                    $this->response = $this->response->withCookie($newCookie);
                } else {
                    // Le cookie n'existe pas
                    $this->Flash->error("Le cookie de score n'existe pas.");
                }
                return $this->redirect(['controller' => 'Pages', 'action' => 'wallet']);
            }
        }
        $this->Flash->error("Vous devez accepter les cookies pour pouvoir jouer");
        return $this->redirect(['controller' => 'Pages', 'action' => 'wallet']);
    }
    // checkAnswersBlockchain
    public function checkAnswersBlockchain() // Verification reponse blockchain
    {
        if ($this->request->is('post')) {
            $valide = $this->request->getCookie('validation');
            
            if ($valide == 1) {
                $data = $this->request->getData();
                // dd($data);
    
                $correctAnswers = 0;
    
                $allQuizzes = $this->Quizzes->find()
                    ->contain(['Answers'])
                    ->where(['category' => 'blockchain'])
                    ->toArray();
    
                foreach ($allQuizzes as $quiz) { // compter les bonnes reponses
                    if (isset($data['reponse'.$quiz->id])) {
                        $selectedAnswer = $data['reponse'.$quiz->id];
                        // dd($quiz->answers);
                        foreach ($quiz->answers as $answer) {
                            // dd($answer->toArray());
                            if (!empty($selectedAnswer) && $answer->num == $quiz->realanswer) {
                                $correctAnswers++;
                            }
                        }
                    }
                }
    
                $points = $correctAnswers * 100; // Calculer les points
                $cookie = $this->request->getCookie('blockchain');
    
                if ($cookie != null) {
                    // Le cookie existe, modifiez sa valeur
                    $newCookie = (new \Cake\Http\Cookie\Cookie('blockchain'))
                        ->withValue($points) // Ajoutez 500 à la valeur actuelle
                        ->withExpiry(new \DateTime('+1 day')); // Définissez l'expiration à 1 jour à partir de maintenant
                    $this->response = $this->response->withCookie($newCookie);
                } else {
                    // Le cookie n'existe pas
                    $this->Flash->error("Le cookie de score n'existe pas.");
                }
                return $this->redirect(['controller' => 'Pages', 'action' => 'wallet']);
            }
        }
        $this->Flash->error("Vous devez accepter les cookies pour pouvoir jouer");
        return $this->redirect(['controller' => 'Pages', 'action' => 'wallet']);
    }
    // checkAnswersNFT
    public function checkAnswersNFT() // Verification reponse blockchain
    {
        if ($this->request->is('post')) {
            $valide = $this->request->getCookie('validation');
            if ($valide == 1) {
                $data = $this->request->getData();

                $correctAnswers = 0;

                $allQuizIds = $this->Quizzes->find('list')->toArray();

                foreach ($allQuizIds as $quizId) { // compter les bonnes reponses
                    if (isset($data['reponse'.$quizId])) {
                        $selectedAnswer = $data['reponse'.$quizId];
                        $quiz = $this->Quizzes->get($quizId);
                        if (!empty($selectedAnswer) && $quiz->realanswer == $selectedAnswer) {
                            $correctAnswers++;
                        }
                    }
                }

                $points = $correctAnswers * 100; // Calculer les points
                $cookie = $this->request->getCookie('nft');

                if ($cookie != null) {
                    // Le cookie existe, modifiez sa valeur
                    $newCookie = (new \Cake\Http\Cookie\Cookie('nft'))
                        ->withValue($points) // Ajoutez 500 à la valeur actuelle
                        ->withExpiry(new \DateTime('+1 day')); // Définissez l'expiration à 1 jour à partir de maintenant
                    $this->response = $this->response->withCookie($newCookie);
                } else {
                    // Le cookie n'existe pas
                    $this->Flash->error("Le cookie de score n'existe pas.");
                }
                return $this->redirect(['controller' => 'Pages', 'action' => 'wallet']);
            }
        }
        $this->Flash->error("Vous devez accepter les cookies pour pouvoir jouer");
        return $this->redirect(['controller' => 'Pages', 'action' => 'wallet']);
    }
    // checkAnswersCrypto
    public function checkAnswersCrypto() // Verification reponse crypto
    {
        if ($this->request->is('post')) {
            $valide = $this->request->getCookie('validation');
            if ($valide == 1) {
                $data = $this->request->getData();

                $correctAnswers = 0;

                $allQuizIds = $this->Quizzes->find('list')->toArray();

                foreach ($allQuizIds as $quizId) { // compter les bonnes reponses
                    if (isset($data['reponse'.$quizId])) {
                        $selectedAnswer = $data['reponse'.$quizId];
                        $quiz = $this->Quizzes->get($quizId);
                        if (!empty($selectedAnswer) && $quiz->realanswer == $selectedAnswer) {
                            $correctAnswers++;
                        }
                    }
                }

                $points = $correctAnswers * 100; // Calculer les points
                $cookie = $this->request->getCookie('crypto');

                if ($cookie != null) {
                    // Le cookie existe, modifiez sa valeur
                    $newCookie = (new \Cake\Http\Cookie\Cookie('crypto'))
                        ->withValue($points) // Ajoutez 500 à la valeur actuelle
                        ->withExpiry(new \DateTime('+1 day')); // Définissez l'expiration à 1 jour à partir de maintenant
                    $this->response = $this->response->withCookie($newCookie);
                } else {
                    // Le cookie n'existe pas
                    $this->Flash->error("Le cookie de score n'existe pas.");
                }
                return $this->redirect(['controller' => 'Pages', 'action' => 'wallet']);
            }
        }
        $this->Flash->error("Vous devez accepter les cookies pour pouvoir jouer");
        return $this->redirect(['controller' => 'Pages', 'action' => 'wallet']);
    }
    public function cookieAccept() {
        $cookie = $this->request->getCookie('validation');
        if ($cookie == null) {
            $validation_cookie = Cookie::create(
                'validation',
                1,
                // All keys are optional
                [
                    'expires' => new \DateTime('+1 day'),
                    'path' => '/',
                    'domain' => '',
                    'secure' => false,
                    'httponly' => false,
                    'samesite' => null // Or one of CookieInterface::SAMESITE_* constants
                ]
            );
            $this->response = $this->response->withCookie($validation_cookie);
        } else {
            $validation_cookie = Cookie::create(
                'validation',
                1,
                // All keys are optional
                [
                    'expires' => new \DateTime('+1 day'),
                    'path' => '/',
                    'domain' => '',
                    'secure' => false,
                    'httponly' => false,
                    'samesite' => null // Or one of CookieInterface::SAMESITE_* constants
                ]
            );
            $this->response = $this->response->withCookie($validation_cookie);
        }
        return $this->redirect($this->referer());
    }

    public function cookieRefuse() {
        $cookie = $this->request->getCookie('validation');
        if ($cookie == null) {
            $validation_cookie = Cookie::create(
                'validation',
                2,
                // All keys are optional
                [
                    'expires' => new \DateTime('+1 day'),
                    'path' => '/',
                    'domain' => '',
                    'secure' => false,
                    'httponly' => false,
                    'samesite' => null // Or one of CookieInterface::SAMESITE_* constants
                ]
            );
            $this->response = $this->response->withCookie($validation_cookie);
        } else {
            $validation_cookie = Cookie::create(
                'validation',
                2,
                // All keys are optional
                [
                    'expires' => new \DateTime('+1 day'),
                    'path' => '/',
                    'domain' => '',
                    'secure' => false,
                    'httponly' => false,
                    'samesite' => null // Or one of CookieInterface::SAMESITE_* constants
                ]
            );
            $this->response = $this->response->withCookie($validation_cookie);
        }
        return $this->redirect($this->referer());


    }
}
