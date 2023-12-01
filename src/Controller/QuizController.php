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
                    if (isset($data[$answer]) && is_array($data[$answer]) && $data[$answer]['error'] === 0 && str_contains($data[$answer]['type'], 'image')) {
                        $newName = strtolower(Text::slug($data[$answer]['name'], ['preserve' => '.']));
                        move_uploaded_file($data[$answer]['tmp_name'], WWW_ROOT . 'img/upload/' . $newName);
                        $data[$answer] = $newName;
                    }
                }
            } else {
                foreach (['answer1', 'answer2', 'answer3'] as $answer) {
                    if (isset($data[$answer])) {
                        $data[$answer] = h($data[$answer]);
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
}
