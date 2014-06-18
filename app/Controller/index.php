public function index() {
$this->Genero->recursive = 0;
		
if ($this->request->is('post')) {
// Load RequestHandler so it will output JSON 
$this->RequestHandler->setContent('json', 'application/json');
		
// Load my Component and transform DataTable request to something Cake will read
$this->DataTable = $this->Components->load('DataTable');
$params = $this->DataTable->modelParams($this->request->data);
			
// Aditional Info for DataTable
$params['iTotal'] = $this->Controller->find('count');
			
// Does two things: uses $params created by modelParams and uses it to transform Cake nested result in something DataTable will read
$json = $this->DataTable->outputView($this->Controller->find('all', $params),$params);
$this->set(compact('json'));
}
}