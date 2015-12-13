<?php
	class Home
	{
		public function eventos($categoria = null, $page = null){
			if($categoria){
				//$categoria = str_replace('-', ' ', $categoria);
				$total = Cultural::where('SUPERCATEGORIA',strtoupper($categoria))->orderBy('FECHAREAL','DESC')->get();
				$final['categoria'] =  $categoria;
			}else{
				$total = Cultural::all();
			}
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

		public function evento($id){
			$total = Cultural::find($id);
			echo json_encode($total);
		}

		public function reformat(){
			 $todos = Cultural::all();
			 foreach ($todos as $value) {
			 	Cultural::update(['FECHAREAL' => date('Y-m-d',strtotime($value->FECHA))],$value->ID);
			 }
		}

		public function admin(){
			$usuarios = DB::getInstance()->query('SELECT `id_usuario`,`nombre`,COUNT(*)*100/(SELECT COUNT(*)FROM `participaciones`) AS percentage FROM `participaciones` GROUP BY `id_usuario` ORDER BY percentage DESC')->results();
			$topics = DB::getInstance()->query('SELECT `culturales`.`CATEGORIA` AS NOMBRE, COUNT(*) AS CUENTA FROM `culturales` INNER JOIN `participaciones` ON `participaciones`.`id_evento` = `culturales`.`ID`GROUP BY `culturales`.`CATEGORIA`')->results();
			$listado = null;
			$objeto = null;
			foreach ($topics as $topico) {
				$objeto['y'] = (int)$topico->CUENTA;
				$objeto['indexLabel'] = $topico->NOMBRE;
				$listado[] = $objeto;
			}
			View::render('reports/admin',['usuarios' => $usuarios,'listado' => $listado]);
		}
		public function participacion(){
			$post = json_decode(file_get_contents("php://input"),true);
			$participacion = $post;
			$check=Participacion::where('id_usuario',$post['id_usuario'])->where('id_evento',$post['id_evento'])->get();
			if(count($check) == 0){
				Participacion::create($participacion);	
				echo json_encode($participacion);
			}else{
				echo json_encode(['Usted ya se registró a este evento']);
			}
			
			
		}

		public function eventospre($categoria = null, $page = null){
			if($categoria){
				//$categoria = str_replace('-', ' ', $categoria);
				$total = Cultural::where('SUPERCATEGORIA',strtoupper($categoria))->get();	
				$final['categoria'] =  $categoria;
			}else{
				$total = Cultural::all();
			}
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