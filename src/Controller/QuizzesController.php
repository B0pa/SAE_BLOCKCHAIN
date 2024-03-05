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
}
