var $ = require( 'jquery' );

document.addEventListener("DOMContentLoaded", function(event) {
  //Опрос в публикации
  if (document.body.classList.contains('single')) {
    let postVote = document.querySelector('.js-post-vote');
    let postVoteItems = document.querySelectorAll('.js-vote-item');

    let postId = postVote.dataset.postId;  
    let postTranslateIds = postVote.dataset.localTranslateId;  

    let postVoteLocal = localStorage.getItem('vote_post_'+postId);
    let postVoteTranslate = localStorage.getItem('vote_post_'+postTranslateIds);
    console.log(postVoteLocal);

    //Показываем результаты, если уже голосовал на странице
    if (localStorage.getItem('vote_post_'+postId) ||  localStorage.getItem('vote_post_'+postTranslateIds)) {
      //Меняем цвет блока
      if (postVoteLocal) {
        document.querySelector('.js-vote-item[data-vote-item="'+ postVoteLocal +'"] > div').classList.add('vote-active');
      } else {
        document.querySelector('.js-vote-item[data-vote-item="'+ postVoteTranslate +'"] > div').classList.add('vote-active');
      }
      
    }

    //Отслеживаем клик
    postVoteItems.forEach(item => {
      item.addEventListener('click', () => {
        // Проверяем голосовал ли уже или нет
        if (localStorage.getItem('vote_post_'+postId) || localStorage.getItem('vote_post_'+postTranslateIds)) {
          console.log('уже голосовал');
          return;
        } else {
          //Куда нажал
          let itemMeta = item.dataset.voteItem;
          
          //Записываем в LocalStorage
          localStorage.setItem('vote_post_'+postId, itemMeta);
          localStorage.setItem('vote_post_'+postTranslateIds, itemMeta);

          // Отправляем запрос
          let data = {
            'action': 'vote_post_click_action',
            'postId': postId,
            'itemMeta': itemMeta,
          };
          // addFavToTable(data);
          $.ajax({
            url: ajaxurl, // AJAX handler
            data: data,
            type: 'POST',
            beforeSend : function(xhr) {
              console.log('Загружаю')
            },
            success : function(data) {
              if (data) {
                //Добавляем результат
                document.querySelector('.js-vote-item[data-vote-item="'+ itemMeta +'"] .js-vote-result').textContent = data;
                //Меняем цвет блока
                document.querySelector('.js-vote-item[data-vote-item="'+ itemMeta +'"] > div').classList.add('vote-active');              
              }
            }
          });
          return;
        }
        
      })
    })    
  }
  

 });