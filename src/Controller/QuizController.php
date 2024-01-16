<?php
declare(strict_types=1);

namespace App\Controller;


use Cake\Utility\Text;
use Laminas\Diactoros\UploadedFile;

/**
 * Quiz Controller
 *
 * @property \App\Model\Table\QuizTable $Quiz
 */
class QuizController extends AppController
{
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);

        $this->Authentication->allowUnauthenticated(['quizzBlockchain','quizzNFT','quizzcrypto','quizzDanger','submitAnswer']);
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
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
            $data = $this->request->getData();
            if ($data['questionform'] === 'image') {
                foreach (['answer1', 'answer2', 'answer3'] as $answer) {
                    /** @var UploadedFile $file */
                    $file = $data[$answer];
                    if (
                        $file->getError() === 0 &&
                        str_contains($file->getClientMediaType(), 'image')) {
                        $newName = strtolower(Text::slug($file->getClientFilename(), ['preserve' => '.']));
                        $file->moveTo(WWW_ROOT . 'img/upload/' . $newName);
                        $data[$answer] = $newName;
                    }
                }
            }
            $quiz = $this->Quiz->patchEntity($quiz, $data);
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
        // Utilisez le "contain" au lieu de "contain:"
        $quiz = $this->Quiz->get($id, ['contain' => []]);

        // Assurez-vous que $quiz est toujours défini même si la requête n'est pas de type POST
        if (!isset($quiz)) {
            $quiz = $this->Quiz->newEmptyEntity();
        }

        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            if ($data['questionform'] === 'image') {
                foreach (['answer1', 'answer2', 'answer3'] as $answer) {
                    /** @var UploadedFile $file */
                    $file = $data[$answer];
                    if (
                        $file->getError() === 0 &&
                        str_contains($file->getClientMediaType(), 'image')
                    ) {
                        $newName = strtolower(Text::slug($file->getClientFilename(), ['preserve' => '.']));
                        $file->moveTo(WWW_ROOT . 'img/upload/' . $newName);
                        $data[$answer] = $newName;
                    }
                }
            }

            // Utilisez une nouvelle variable, par exemple, $editedQuiz, pour éviter la confusion avec $quiz
            $editedQuiz = $this->Quiz->patchEntity($quiz, $data);
            if ($this->Quiz->save($editedQuiz)) {
                $this->Flash->success(__('The quiz has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The quiz could not be saved. Please, try again.'));
            }
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
        $quizes = $this->Quiz->find()
            ->where(['category' => 'danger'])
            ->toArray();

        $this->set(compact('quizes'));
    }

    public function quizzNFT()
    {
        $quizes = $this->Quiz->find()
            ->where(['category' => 'nft'])
            ->toArray();

        $this->set(compact('quizes'));
    }

    public function quizzcrypto()
    {
        $quizes = $this->Quiz->find()
            ->where(['category' => 'crypto'])
            ->toArray();

        $this->set(compact('quizes'));
    }

    public function quizzBlockchain()
    {
        $quizes = $this->Quiz->find()
            ->where(['category' => 'blockchain'])
            ->toArray();


        $this->set(compact('quizes'));
    }

    public function submitAnswer()
    {
        // Récupérez la réponse soumise par l'utilisateur
        $user_answer = $this->request->getData('reponse');

        // Récupérez l'ID de la question
        $question_id = $this->request->getData('question_id');

        // Récupérez la bonne réponse
        $quiz = $this->Quiz->find()
            ->where(['id' => $question_id])
            ->first();

        if ($quiz) {
            $correct_answer = null;
            if ($quiz->realanswer == 1) {
                $correct_answer = $quiz->answer1;
            } elseif ($quiz->realanswer == 2) {
                $correct_answer = $quiz->answer2;
            } elseif ($quiz->realanswer == 3) {
                $correct_answer = $quiz->answer3;
            }

            // Comparez la réponse de l'utilisateur avec la bonne réponse
            if ($user_answer == $correct_answer) {
                $this->Flash->success(__('La réponse est correcte.'));
            } else {
                $this->Flash->error(__('La réponse est incorrecte.'));
            }
        } else {
            $this->Flash->error(__('Question not found.'));
        }

        // Redirigez l'utilisateur vers la page précédente
        return $this->redirect($this->referer());
    }
}
