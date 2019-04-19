$('.change-status').click(
	function(e){
		event.preventDefault();                                                                                                                   
		event.stopPropagation(); 
		var mode = $(this).attr('status');
		var url = 'response?status=' + mode;
		var allstatus=[];
		for(var i=0;i<100;i++){
			$.ajax(url)
			.always(function (data,textstatus,jqXHR) {
				if(typeof jqXHR == "string"){
    				var stat = data.status.toString();
				}
				else{
    				var stat = jqXHR.status.toString();
				}
				if(typeof allstatus[stat] == 'undefined'){
					allstatus[stat]=0;
				}
				allstatus[stat]+=1;
				var html = '<br><div class="row"><div class="resp">Status</div><div class="resp">%</div></div><br/>';
				var total = 0;
				allstatus.forEach(function(runs){
					total=total+runs;
				});
				
				//Update the html table
				allstatus.forEach(function(runs,statcode){
					var per = (runs/total)*100;
					html=html+'<div class="row"><div class="resp">'+statcode+'</div><div class="resp">'+per.toFixed(2)+'%</div> </div> <br/>'
				});
				$("#response-codes").html(html);
			});	
		}
	}
);
