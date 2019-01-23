function check(){
	var namae = document.genreinput.elements['AddGenreName'].value; //nameを利用して入力した価を獲得
	var flag = 0; //動作管理用のフラグ

	if (namae == ""){ 
		flag = 1;
	}

	if (flag){

	 	document.genreinput.elements['flagbox'].value = 1;
	 	 //未入力の場合処理を止めるようにPHP側で設定されているのでその処理に
    }else{

		if(window.confirm('「' + namae + '」でジャンルを追加して良いですか?')){ 
		document.genreinput.elements['flagbox'].value = 1; 
		
		}else{

			document.genreinput.elements['flagbox'].value = 0;
			
			return false;
		}
		
	}



}