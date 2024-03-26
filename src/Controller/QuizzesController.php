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
        $this->Authentication->allowUnauthenticated(['quizzDanger', 'quizzNFT', 'quizzcrypto', 'quizzBlockchain', 'checkAnswersDanger', 'checkAnswersNFT', 'checkAnswersCrypto', 'checkAnswersBlockchain', 'cookieAccept', 'cookieRefuse', 'incrementCount', 'reloadQuizCell']);
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
    }
    public function quizzNFT()
    {
    }
    public function quizzcrypto()
    {
    }
    public function quizzBlockchain()
    {
        $session = $this->getRequest()->getSession();
        $count = $session->read('count');
        $session->write('currentURL', 'quizz-blockchain');
        if ($count === null) {
            $count = 0;
        }

        // Récupérez le quiz correspondant à l'index

        $quiz_lvl1 = $this->Quizzes->find()
            ->contain(['Answers'])
            ->where(['category' => 'blockchain', 'level' => 1])
            ->toArray();

        $quiz_lvl2 = $this->Quizzes->find()
            ->contain(['Answers'])
            ->where(['category' => 'blockchain', 'level' => 2])
            ->toArray();

        $quiz_lvl3 = $this->Quizzes->find()
            ->contain(['Answers'])
            ->where(['category' => 'blockchain', 'level' => 3])
            ->toArray();

        // Passez le quiz à la vue
        $this->set('count', $count);
        $this->set(compact('quiz_lvl1'));
        $this->set(compact('quiz_lvl2'));
        $this->set(compact('quiz_lvl3'));
        $this->set(compact('selectedAnswers'));
    }

    public function incrementCount() {
        $this->autoRender = false;
        $session = $this->getRequest()->getSession();
        $count = $session->read('count');
        if ($count === null) {
            $count = 0;
        }
        $count++;
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
        $count--;
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
        $session = $this->getRequest()->getSession();
        
        $quizId = $this->request->getData('quizId');
        $selectedAnswer = $this->request->getData('answer');

        // Récupérez le tableau des réponses sélectionnées du cache
        if ($session->read('selectedAnswers') === null) {
            // Si le tableau n'existe pas encore, créez-le
            $selectedAnswers = [];
        } else {
            $selectedAnswers = $session->read('selectedAnswers');
        }

        $selectedAnswers[$quizId] = $selectedAnswer;
        
        $session->write('selectedAnswers', $selectedAnswers);

        return $this->redirect($this->referer());
    }


    public function checkAnswersDanger() // Verification reponse danger

    {



    }

    public function checkAnswersBlockchain()

    {



    }

    // checkAnswersNFT

    public function checkAnswersNFT() // Verification reponse blockchain

    {



    }

    // checkAnswersCrypto

    public function checkAnswersCrypto() // Verification reponse crypto

    {



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
