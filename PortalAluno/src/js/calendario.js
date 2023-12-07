(function(win,doc){
    'use strict';

    function exibir_calendario(perfil, div)
    {
        let calendarEl=doc.querySelector(div);
        let calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            headerToolbar:{
                start: 'prev,next,today',
                center: 'title',
                end: 'dayGridMonth, timeGridWeek, timeGridDay'
            },
            buttonText:{
                today:    'hoje',
                month:    'mês',
                week:     'semana',
                day:      'dia'
            },
            locale:'pt-br',
            
            dateClick: function(info) {
                if(perfil == 'manager'){
                    calendar.changeView('timeGrid', info.dateStr);
                }else{
                    if(info.view.type == 'dayGridMonth'){
                        win.location.href='../view/add_evento.php?date='+info.dateStr;
                    }else{
                        win.location.href='../view/add_evento.php?date='+info.dateStr;
                    }
                }
                /*alert('Clicked on: ' + info.dateStr);
                alert('Coordinates: ' + info.jsEvent.pageX + ',' + info.jsEvent.pageY);
                alert('Current view: ' + info.view.type);*/
            },
            events: '../controller/EventoController.php?acao=exibir_eventos',
            eventClick: function(info) {
                if(perfil == 'user'){
                
                    var id = info.event.id;
                    var title = info.event.title;
                    var description = info.event.extendedProps.description;
                    var start = info.event.start;
                    var end = info.event.end;
                
                    // Preencha o modal com os detalhes do evento
                    $('#event-id-editar').val(id);
                    $('#event-id-excluir').val(id);
                    $('#event-title').text('Título: ' + title);
                    $('#event-description').text('Descrição: ' + description);
                    $('#event-start').text('Início: ' + start.toLocaleString());
                    $('#event-end').text('Fim: ' + end.toLocaleString());
                
                    // Abra o modal
                    $('#event-details-modal').modal('show');
                }
            }   
        
        });
        calendar.render();
    }


    if(doc.querySelector('.calendarUser')){
        exibir_calendario('user','.calendarUser');
    }else if(doc.querySelector('.calendarManager')){
        exibir_calendario('manager','.calendarManager');
    }

})(window,document);