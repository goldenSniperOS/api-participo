<?php
	class Desarrollos
	{
		public function listado($page = null){
			$total = Desarrollo::all();
			
			if($page){
				$final['total'] = count($total);
				$pages = ceil(count($total) / 10);
				$total = array_slice($total, 10*($page-1),10);
				$final['pages'] = $pages;
				$final['data'] = $total;
				$final['currentPage'] = (int)$page;

			}else{
				$final['total'] = count($total);
				$final['data'] = $total;
			}		
			echo json_encode($final);
		}

		public function busqueda($id){
			$total = Desarrollo::find($id);
			echo json_encode($total);
		}

		public function reformat(){
			 $todos = Desarrollo::all();
			 foreach ($todos as $value) {
			 	Desarrollo::update(['FECHAREAL' => date('Y-m-d',strtotime($value->FECHA))],$value->ID);
			 }
		}
	

		public function listadopre($page = null){
			$total = Desarrollo::all();
			if($page){
				$final['total'] = count($total);
				$pages = ceil(count($total) / 10);
				$total = array_slice($total, 10*($page-1),10);
				$final['pages'] = $pages;
				$final['data'] = $total;
				$final['currentPage'] = (int)$page;

			}else{
				$final['total'] = count($total);
				$final['data'] = $total;
			}
			echo '<pre>';
			echo json_encode($final);
			echo '</pre>';
		}
	}