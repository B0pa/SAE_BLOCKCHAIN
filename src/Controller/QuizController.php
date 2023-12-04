<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Quiz Controller
 *
 * @property \App\Model\Table\QuizTable $Quiz
 */
class QuizController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->Authentication->addUnauthenticatedActions(['quizzDanger','quizzNFT','quizzcrypto','quizzBlockchain']);
    }


    public function index()
    {
        $query = $this->Quiz->find();
        $quiz = $this->paginate($query);

        $this->set(compact('quiz'));
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
        $quiz = $this->Quiz->get($id, contain: []);
        $this->set(compact('quiz'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $quiz = $this->Quiz->newEmptyEntity();
        if ($this->request->is('post')) {
            $quiz = $this->Quiz->patchEntity($quiz, $this->request->getData());
            if ($this->Quiz->save($quiz)) {
                $this->Flash->success(__('The quiz has been saved.'));

                return $this->redirect(['action' => 'index']);
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
        $quiz = $this->Quiz->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $quiz = $this->Quiz->patchEntity($quiz, $this->request->getData());
            if ($this->Quiz->save($quiz)) {
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
        $quiz = $this->Quiz->get($id);
        if ($this->Quiz->delete($quiz)) {
            $this->Flash->success(__('The quiz has been deleted.'));
        } else {
            $this->Flash->error(__('The quiz could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function quizzDanger()
    {
        $quiz = $this->Quiz->find()
            ->where(['category' => 'danger'])
            ->toArray();

        $this->set(compact('quiz'));
    }


    public function quizzNFT() {

        if ($this->request->is('post')) {

            $submittedAnswer = $this->request->getData('reponse');
            $quiz = $this->Quiz->get($this->request->getData('quiz_id'));

            if($submittedAnswer == $quiz->realanswer) {
                $this->Flash->success('Bonne réponse!');
            } else {
                $this->Flash->error('Mauvaise réponse!');
            }

        } else {

            $quiz = $this->Quiz->find()
                ->where(['category' => 'nft'])
                ->toArray();

            $this->set(compact('quiz'));

        }

    }
    public function checkAnswer() {

        // Récupérer données POST
        $submittedAnswer = $this->request->getData('reponse');
        $quizId = $this->request->getData('quiz_id');

        // Trouver l'entité Quiz
        $quiz = $this->Quiz->get($quizId);

        // Vérifier réponse
        if($submittedAnswer == $quiz->realanswer) {
            $this->Flash->success('Bonne réponse!');
        } else {
            $this->Flash->error('Mauvaise réponse!');
        }

        return $this->redirect($this->referer());

    }

    public function quizzcrypto()
    {
        $quiz = $this->Quiz->find()
            ->where(['category' => 'crypto'])
            ->toArray();

        $this->set(compact('quiz'));
    }

    public function quizzBlockchain()
    {
        $quiz = $this->Quiz->find()
            ->where(['category' => 'blockchain'])
            ->toArray();

        $this->set(compact('quiz'));
    }
}
