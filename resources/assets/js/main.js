(function(){
  'use strict';

  var cmds = document.getElementsByClassName('delete');
  var i;

  for(i = 0; i < cmds.length; i++) {
    cmds[i].addEventListener('click',function(e){
      e.preventDefault();
      if (confirm('削除してもいいですか？')) {
        document.getElementById('form_' + this.dataset.id).onsubmit();
      }
    });
  }

})();