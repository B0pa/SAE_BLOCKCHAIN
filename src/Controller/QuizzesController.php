<?php

declare(strict_types=1);



namespace App\Controller;



use Cake\View\CellRegistry;

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
    public function initialize(): void
    {
        parent::initialize();
        $this->Authentication->allowUnauthenticated(['getAnswer', 'quizzDanger', 'quizzNFT', 'quizzcrypto', 'quizzBlockchain', 'checkAnswersDanger', 'checkAnswersNFT', 'checkAnswersCrypto', 'checkAnswersBlockchain', 'cookieAccept', 'cookieRefuse', 'incrementCount', 'decrementCount', 'reloadQuizCell']);
    }

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

        $quiz = $this->Quizzes->get($id, [
            'contain' => ['Answers']
        ]);
        
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
        $session = $this->getRequest()->getSession();
        $count = $session->read('count');
        $oldCurrentURL = $session->read('currentURL');
        if ($oldCurrentURL !== 'quizz-danger') {
            $session->write('count', 0);
            $session->write('currentURL', 'quizz-danger');
            $session->write('selectedAnswers', []);
        }

        if ($count === null) {
            $count = 0;
        }
        
        // Passez le quiz à la vue
        $this->set('count', $count);
    }

    public function quizzNFT()
    {
        $session = $this->getRequest()->getSession();
        $count = $session->read('count');
        $oldCurrentURL = $session->read('currentURL');
        if ($oldCurrentURL !== 'quizz-n-f-t') {
            $session->write('count', 0);
            $session->write('currentURL', 'quizz-n-f-t');
            $session->write('selectedAnswers', []);
        }

        if ($count === null) {
            $count = 0;
        }
        
        // Passez le quiz à la vue
        $this->set('count', $count);
    }

    public function quizzcrypto()
    {
        $session = $this->getRequest()->getSession();
        $count = $session->read('count');
        
        $oldCurrentURL = $session->read('currentURL');
        if ($oldCurrentURL !== 'quizz-crypto') {
            $session->write('count', 0);
            $session->write('currentURL', 'quizz-crypto');
            $session->write('selectedAnswers', []);
        }

        if ($count === null) {
            $count = 0;
        }
        
        // Passez le quiz à la vue
        $this->set('count', $count);
    }

    public function quizzBlockchain()
    {
        $session = $this->getRequest()->getSession();
        $count = $session->read('count');
        $numberOfQuizzes = $this->Quizzes->find()->count();

        // Stockez ce nombre dans la session
        $session->write('numberOfQuizzes', $numberOfQuizzes);

        $oldCurrentURL = $session->read('currentURL');
        if ($oldCurrentURL !== 'quizz-blockchain') {
            $session->write('count', 0);
            $session->write('currentURL', 'quizz-blockchain');
            $session->write('selectedAnswers', []);
        }

        if ($count === null) {
            $count = 0;
        }
        
        // Passez le quiz à la vue
        $this->set('count', $count);
    }

    public function incrementCount() {
        $this->autoRender = false; 
        $session = $this->getRequest()->getSession();
        $count = $session->read('count');
        $numberOfQuizzes = $session->read('numberOfQuizzes');
    
        if ($count === null) {
            $count = 0;
        }
        if ($count < $numberOfQuizzes-1) {
            $count++;
        }else if ($count == $numberOfQuizzes) {
            $this->redirect(['action' => 'endQuiz']);
        }
        $session->write('count', $count);
        return $this->response->withStringBody((string)$count);
    }

    public function decrementCount() {
        $this->autoRender = false;
        $session = $this->getRequest()->getSession();
        $count = $session->read('count');
        if ($count === null) {
            $count = 0;
        }
        if ($count > 0) {
            $count--;
        }
        $session->write('count', $count);
        return $this->response->withStringBody((string)$count);
    }

    public function reloadQuizCell() {
        $this->autoRender = false;
        // Create a new instance of QuizCell
        $view = $this->createView();
        // Pass the $count and $currentURL as parameters to the QuizCell
        $cell = $view->cell('Quiz::display');
        echo $cell;
    }

    public function getAnswer()
    {
        // Récupérez la session
        $session = $this->getRequest()->getSession();

        $count = $session->read('count');
        $selectedAnswer = $this->request->getData('answer');

        // Récupérez le tableau des réponses sélectionnées du cache
        if ($session->read('selectedAnswers') === null) {
            // Si le tableau n'existe pas encore, le créez
            $selectedAnswers = [];
        } else {
            // Si le tableau existe déjà, le récupérez
            $selectedAnswers = $session->read('selectedAnswers');
        }

        // Ajoutez la réponse sélectionnée au tableau des réponses sélectionnées
        $selectedAnswers[$count] = $selectedAnswer;
        // Enregistrez le tableau des réponses sélectionnées dans le cache
        $session->write('selectedAnswers', $selectedAnswers);
        $url = $session->check('currentURL') ? $session->read('currentURL') : 'defaultURL';

        return $this->redirect(['action' => $url]);

    }
    public function endQuiz() {
        $session = $this->getRequest()->getSession();
        $selectedAnswers = $session->read('selectedAnswers');
        $quizzes = $this->Quizzes->find()->toArray();
        $score = 0;
        // Calculer le score et le stoocker dans un cookie                            TODOS
        $session->write('count', 0);
        $session->write('currentURL', 'defaultURL');
        $session->write('selectedAnswers', []); 
        $session->write('numberOfQuizzes', 0);
        return $this->redirect(['controller'=>'Pages', 'action' => 'wallet']);
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
