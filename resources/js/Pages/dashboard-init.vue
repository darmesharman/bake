


        
<template>
    <div>
       <section class="dashboard">

            <div class="notifications"></div>

            <div class="dashboard-sidebar">

                <div class="d-tabs">

                    <a href="/" class="logo-tab icon-analytics"></a>

                    <nav>
                        <ul>
                            <li class="d-tab show-s-window icon-avatar" data-sidebar="dashboard">Кабинет</li>
                            <li class="d-tab show-s-window icon-archive" data-sidebar="company">Компании</li>
                            <li class="d-tab show-s-window icon-chat" data-sidebar="reviews">Отзывы</li>
                            <li class="d-tab show-s-window icon-wallet" data-sidebar="payments">Платежи</li>
                            <li class="d-tab show-s-window icon-help" data-sidebar="help">Помощь</li>
                        </ul>
                    </nav>
                    <form method="POST" action=" route('logout') }}">
                        @csrf

                        <button type='submit' class="d-tab icon-off">Выйти</button>
                    </form>


                </div>

                <div class="links">

                    <div class="links-top">

                        <div class="sidebar-window show-always">

                            <h5 class="links-header mb0">Уведомления</h5>

                            <div class="last-notifs">

                                <a href="#" class="item">
                                    <div class="avatar">Ж</div>
                                    <div class="text">
                                        <div class="header">
                                            <h5>Жан Ильяс</h5>
                                            <div class="time">12 минут назад</div>
                                        </div>
                                        <p>Оставил комментарий на фотографии</p>
                                    </div>
                                </a>

                                <a href="#" class="item">
                                    <div class="avatar">Ж</div>
                                    <div class="text">
                                        <div class="header">
                                            <h5>Жан Ильяс</h5>
                                            <div class="time">12 минут назад</div>
                                        </div>
                                        <p>Оставил комментарий на фотографии</p>
                                    </div>
                                </a>

                                <a href="#" class="item">
                                    <div class="avatar">Ж</div>
                                    <div class="text">
                                        <div class="header">
                                            <h5>Жан Ильяс</h5>
                                            <div class="time">12 минут назад</div>
                                        </div>
                                        <p>Оставил комментарий на фотографии</p>
                                    </div>
                                </a>

                                <a href="#" class="item">
                                    <div class="avatar">Ж</div>
                                    <div class="text">
                                        <div class="header">
                                            <h5>Жан Ильяс</h5>
                                            <div class="time">12 минут назад</div>
                                        </div>
                                        <p>Оставил комментарий на фотографии</p>
                                    </div>
                                </a>

                                <a href="/notifications" class="watch-all">Посмотреть все уведомления</a>

                            </div>

                        </div>

                        <div class="sidebar-window" data-name="dashboard">

                            <h5 class="links-header mb0">Кабинет <div class="close-window icon-close"></div></h5>

                            <ul>
                                <li>
                                    <a href=" route('dashboard') }}">
                                        <h6>Главная</h6>
                                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
                                    </a>
                                </li>

                                <li>
                                    <a href=" route('user.edit') }}">
                                        <h6>Редактировать профиль</h6>
                                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
                                    </a>
                                </li>

                                <li>
                                    <a href="#">
                                        <h6>Избранные</h6>
                                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
                                    </a>
                                </li>
                            </ul>

                        </div>

                        <div class="sidebar-window" data-name="company">

                            <h5 class="links-header mb0">Компании <div class="close-window icon-close"></div></h5>

                            <ul>
                                <li>
                                    <a href="/dashboard/my-companies">
                                        <h6>Мои компании</h6>
                                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="/dashboard/requisites/">
                                        <h6>Реквизиты</h6>
                                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="/dashboard/members/">
                                        <h6>Наши сотрудники</h6>
                                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="sidebar-window" data-name="reviews">

                            <h5 class="links-header mb0">Кабинет <div class="close-window icon-close"></div></h5>

                            <ul>
                                <li>
                                    <a href="/dashboard/reviews/">
                                        <h6>Мои отзывы</h6>
                                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="sidebar-window" data-name="payments">

                            <h5 class="links-header mb0">Кабинет <div class="close-window icon-close"></div></h5>

                            <ul>
                                <li>
                                    <a href="/dashboard/payments/">
                                        <h6>Платежи</h6>
                                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="sidebar-window" data-name="help">

                            <h5 class="links-header mb0">Помощь <div class="close-window icon-close"></div></h5>

                            <div class="help-block article">
                                <p>Если у вас есть вопросы, Вы можете обратиться в службу поддержки</p>
                                <button class="btn full square">Служба поддержки</button>
                            </div>
                        </div>

                    </div>

                    <div class="user-balance">
                        <form class="article-sm rel z1 article-sm">
                            <h5 class="icon-wallet">0 тг.</h5>
                            <p class="grey-text">Баланс на вашем счету</p>
                            <div class="form-group">
                                <div class="input-wrapper">
                                    <div class="icon">тг.</div>
                                    <input type="text" class="price-mask required" data-type="balance" placeholder="0">
                                </div>
                            </div>
                            <button class="btn small square full large balance-btn">Пополнить счет</button>
                        </form>
                    </div>

                </div>
            </div>

            <div class="dashboard-body">

                <a href="/add-company" class="fixed-btn icon-plus"></a>

                <div class="dashboard-header">

                    <button class="btn icon bordered square large icon-search dashboard-search mra"></button>

                    <nav class="lg-text">
                        <ul>
                            <li><a href=" route('dashboard') }}" class="active">Главная</a></li>
                            <li><a href=" route('user.edit') }}">Редактировать профиль</a></li>
                            <li><a href="#">Избранные</a></li>`
                            <li><a href="#">Мои отзывы</a></li>
                        </ul>
                    </nav>

                    <div class="dashboard-user-block rel toggle-dropdown">

                        <div class="content icon-user">
                            <span> Auth::user()->first_name }}  Auth::user()->last_name }}</span>
                        </div>

                        <div class="d-dropdown">

                            <div class="user-info">
                                <div class="avatar">Т</div>
                                <div class="text">
                                    <h6> Auth::user()->first_name }}  Auth::user()->last_name }}</h6>
                                    <p class="grey-text"> Auth::user()->phone_number }}</p>
                                    <div class="label theme">Пользователь</div>
                                </div>
                            </div>

                            <ul>
                                <li><a href="/dashboard" class="icon-user">Личный кабинет</a></li>
                                <li><a href="#" class="icon-archive">Мои компании</a></li>
                                <li><a href="#" class="icon-inbox">Заявки</a></li>
                            </ul>

                            <ul>
                                <li><a href=" route('user.edit') }}" class="icon-edit">Редактировать профиль</a></li>
                                <li><a href="https://mykid.init.kz/wp-login.php?action=logout&amp;_wpnonce=ce75a745db" class="icon-off red">Выйти из аккаунта</a></li>
                            </ul>

                        </div>

                    </div>

                </div>
                @if(request()->routeIs('dashboard'))
                    @include('dashboardAddCompany')
                @elseif (request()->routeIs('user.edit'))
                    @include('profile.show')
                @endif

            </div>
        </section>


  </div>

</template>


<script>
import Boards from './components/boards.vue'

  export default {
      data:function() {
          return {
                dashboard: this.$store.state.dashboard
          }
      },
      props: {

      },
      sockets: {
          connection () {
              console.log('socket connected!!')
          },
          users (socketname) {

            this.sockets.subscribe(socketname, (data) => {

              if(data.last_update != this.$store.state.dashboard.lastupdate) {

                
                let switchOptions = (option, details)=> {

                  switch (option) {
                    case 0:
                      this.$store.dispatch('boardCreateUpdates', details);
                    break;
                    case 1:
                      this.$store.dispatch('boardUpdateUpdates', details);
                    break;
                    case 2:
                      this.$store.dispatch('boardDeleteUpdates', details);
                    break; 
                    case 10:
                      this.$store.dispatch('leadCreateUpdates', details);
                    break;
                    case 11:
                      this.$store.dispatch('leadUpdateUpdates', details);
                    break;
                    case 12:
                      this.$store.dispatch('leadDeleteUpdates', details);
                    break;
                  } 
                }
                data.data.forEach(event => {
                  
                    if(event.details[0] != null){
                        event.details.forEach(detail => {
                          switchOptions(event.event, detail )
                        });
                    }

                });
              }


          })

        }
          
      },
      components: { 
          Boards
      },
      computed: {
      },
      sockets: {
          connection () {
              console.log('socket connected!!')
          },
          users (socketname) {

          

          }
      },
      methods: {
          boardAddEvent() {
            this.$store.state.dashboard.addingboard = true
          },
          boardCreate(evt) {
            this.$store.dispatch('boardCreate', this.$refs.newboardtextarea.value);
            this.$store.state.dashboard.addingboard = false
        
          },
          onDrop(evt, itemid2) {

            if(this.$store.state.dashboard.cold) {
                const itemid = evt.dataTransfer.getData('itemid')

                this.$store.dispatch('swapBoards', {itemid:itemid, itemid2: itemid2});

                this.$store.state.dashboard.cold = false;
                this.$store.state.dashboard.isediting=true

            }
        },
          /*GET_BOARDS(response) {
            var data = response.data[1]["00"];
            this.$store.state.dashboard.lastupdate = response.data[0];
            // console.log(response.data);
            if(data.length >= 1)
              for (var idx = 0; idx < data.length; idx++) {
                console.log(data[idx])
                if("id" in data[idx])
                  this.data.items.push({id:data[idx].id, title: data[idx].title, order: data[idx].order, leads:[]})
              }
          },
          GET_LEADS(response) {
            var data = response.data[1]["01"];
            this.$store.state.dashboard.lastupdate = response.data[0];
            console.log(response.data[1]["01"])
            if(data.length >= 1)
              for (var idx = 0; idx < data.length; idx++) {
                for (var idy = 0; idy < this.data.items.length; idy++) {
                  if(this.data.items[idy].id == data[idx].board_id) {
                    this.data.items[idy].leads.push({id: data[idx].id, board_id: data[idx].board_id, description: data[idx].description, order: data[idx].order})
                    break;
                  }
                }
              }
          },   */
          /* getUpdates() {
            var url = "http://localhost:8001/api/update_boards/"+this.$store.state.dashboard.lastupdate;
            let config = {'headers': {}}
            axios.get(url, config)
                .then(response => {
                  this.GET_BOARDS(response);
                  this.GET_LEADS(response);
                })
          }, */
      },
    mounted() {
        
        this.$store.dispatch('fetchDashboard', this.sockets);
        var name = 'TOM';

        // this.$store.dispatch('fetchSockets');
        // while(true) {
        //   if(this.dashboard.token!=null)
        //   break
        // }
        // console.log(this.$store.state.dashboard.token)
         
        // setTimeout(function() {
        //   console.log('subed to: ', this.$store.state.dashboard.token)
          // this.dashboard.token
        
          // this.sockets.subscribe(this.$store.state.dashboard.token, (data) => {
          //   console.log(data);
          //   console.log('wtfhithat');
          // });
        // }, 3000)

        
    },
    created() {

        // this.$socket.emit('loaded', {token: this.$store.state.dashboard.token})


    }
}
</script>

<style scoped>

  .container {
    position: relative;
    min-width: 1360px;
    max-width: 1600px;
    /* display: block; */ 
    /* justify-content: center; */
    margin: 0 auto;
    border: 1.2px solid;
  }
  .board-context {
    display: inline-block;
    vertical-align: top;
    width: 272px;
    margin:0 4px;
    background-color:#EBEBEB;
  }
   .boards-append {
    position: relative;
    display: inline-block;
    min-width: 80px;
    width:80px ;
    background-color: azure;
    border-radius: 14px;
  }

  .boards-append-adding-form {
    position: relative;
    min-height: 70px;
    display: block;
    margin: 0 auto;
    min-width: 70px;
    width: 100%;
  }
  .boards-append-adding-form  textarea {
    height: 27px;
    line-height: 27px;
    width:auto;
    max-width: 120px;
    overflow: hidden; 
    overflow: none;
    outline: none;
    border:none;
    resize: none;
    cursor: pointer;
    line-height: normal;

  /* box-sizing: border-box;
  resize: none;
  position: absolute;
  width: 100%;
  height: 100%;  */
  }
 
   .boards-append-adding-form  textarea [type=text] {
    width: 90px;
    height: auto;
    word-wrap: break-word;
    word-break: break-all;
    display: block;
    margin: 0 auto;
  }
  
  .btn-boards-append:hover {
    text-decoration: underline;
    cursor: pointer;
  }
  .boards-append-adding-card {
    height: 125px;
    transition:1.6s;
    
  }
  .boards-append-adding-card .btn-boards-append {
    display: none;
  }
  .boards-append-adding-btn {
    position: absolute;
    visibility: hidden;
    opacity: 0;
  }
/* boards-append boards-append-adding-card */
  .boards-append-adding-btn:hover {
    text-decoration: none;
    cursor:none;
  }
</style>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
h1, h2, h3, h4, h5 {
   margin:0;
   padding:0; 
}
div {
  margin: 0;
  padding:0;
}
</style>