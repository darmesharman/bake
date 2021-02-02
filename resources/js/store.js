import Vue from 'vue'
import Vuex from 'vuex'
import axios from "axios";
import FormData from 'form-data';
 
import axiosCookieJarSupport from 'axios-cookiejar-support'
import tough from 'tough-cookie';

axiosCookieJarSupport(axios);

Vue.use(Vuex);

import repository from "./repository";

export default new Vuex.Store({
    state: {
        connect: false,
        message: null,
        socketid: null,
        lastupdate:null,
        items: null,
        addingboard:false,
        newleaddescription:'none',
        medifylead: [],
        newcoltitle:'n',
        modifyingleadID:-1,
        modifyinleadcolID:-1,
        loaded: false,
        clicks:0,
        cold:false,
        isediting:true,
        timer:null,
        isdraggable:false,
        leadadding: false,
        newleadcontent:'',
        hascompanies_data:false,
        hashome_data:false,
        hasdashboard_data:false,
        companies:[],
        home:{  searchForm:{cityID:-1, destrictID:-1, categoryID:-1}, 
                companies: [], categories: [], cities: [], districts: [], blogs: []},
        dashboard:{ items:[], token:null, updates:null, },
        user: sessionStorage.user ? JSON.parse(sessionStorage.getItem('user')) : null

    },
    mutations:{
        SOCKET_CONNECT: (state,  status ) => {
          console.log(55)
          state
          status
            state.connect = true;
        },
        SOCKET_USER_MESSAGE: (state,  message) => {
            state.message = message;
            state
            status
        },
        CREATE_LEAD:(state, data)=> {
            state.dashboard.items[data.colidx].leads.push({
                id:data.id,
                board_id: data.item.id,
                description: data.value,
                created_at: data.created_at,
                updated_at: data.updated_at
            })
        },
        REMOVE_LEAD:(state, data)=> {
            // state.dashboard.items
            // let index = state.dashboard.items[data.colidx].leads[data.leadidx]
            state.dashboard.items[data.colidx].leads.splice(data.leadidx, 1)
        },
        UPDATE_LEAD:(state, data)=> {
            let index = state.dashboard.items[data.colidx].leads.findIndex(y => y.id == data.lead.id)
            state.dashboard.items[data.colidx].leads[index].description = data.value
        },
        CREATE_BOARD:(state, data)=> {
            console.log(data)
            state.dashboard.items.push({id:data.id, title: data.title, order: data.order, leads: [], created_at:data.created_at, updated_at:data.updated_at})
        },
        REMOVE_BOARD:(state, item)=> {
            let index = state.dashboard.items.findIndex(y => y.id == item.id)
            state.dashboard.items.splice(index, 1)
        },
        UPDATE_BOARD:(state, data)=> {
            let index = state.dashboard.items.findIndex(y => y.id == data.item.id)
            state.dashboard.items[index].title = data.value
        },
        SWAP_BOARDS:(state, data)=> {
            var index = state.dashboard.items.findIndex(item => item.id == data.itemid)
            var index2 = state.dashboard.items.findIndex(item => item.id == data.itemid2)
            let rows = [state.dashboard.items[index], state.dashboard.items[index2]];
            state.dashboard.items.splice(index2, 1, rows[0] );
            state.dashboard.items.splice(index, 1, rows[1] );
        },
        CREATE_BOARD_UPDATE:(state, details)=> {
            // let index = state.dashboard.items.findIndex(y => y.id == data.item.id)
            if(!state.dashboard.items.some(e => 
                e.id == details.id
             ))
            state.dashboard.items.push({ id:details.id, order:details.order,
                title:details.title, created_at:details.created_at, updated_at:details.updated_at, leads:[]})
        },
        UPDATE_BOARD_UPDATE:(state, details)=> {

            let index = state.dashboard.items.findIndex(y => y.id == details.id)

                state.dashboard.items[index].order = details.order
                state.dashboard.items[index].title = details.title
                state.dashboard.items[index].updated_at = details.updated_at
        },
        DELETE_BOARD_UPDATE:(state, details)=> {
            
            console.log()
            if(state.dashboard.items.some(e => 
                e.id == details.id
             )) {

                let index = state.dashboard.items.findIndex(y => y.id == details.id)
                state.dashboard.items.splice(index, 1)
                // state.dashboard.items.push({ id:details.id,
                    // title:details.title, order:details.order, updated_at:details.updated_at})
            }
        },
        CREATE_LEAD_UPDATE:(state, details)=> {
            let index = state.dashboard.items.findIndex(y => y.id == details.board_id)

            if(!state.dashboard.items[index].leads.some(e => 
                e.id == details.id
            ))

            state.dashboard.items[index].leads.push({
                id:details.id,
                board_id: details.board_id,
                description: details.description,
                created_at: details.created_at,
                updated_at: details.updated_at
            })
        },
        UPDATE_LEAD_UPDATE:(state, details)=> {
            let index = state.dashboard.items.findIndex(y => y.id == details.board_id)
            let idx = state.dashboard.items[index].leads.findIndex(y => y.id == details.id)
            state.dashboard.items[index].leads[idx].description = details.description
            updated_at = details.updated_at
        },
        DELETE_LEAD_UPDATE:(state, details)=> {
            let index = state.dashboard.items.findIndex(y => y.id == details.board_id)
            
            if(state.dashboard.items[index].leads.some(e=> e.id == details.id)) {
                let idx = state.dashboard.items[index].leads.findIndex(y => y.id == details.id)
                console.log(idx)
                state.dashboard.items[index].leads.splice(idx, 1)
            }
        },
        FETCH_HOME:(state, data)=> {
            
            state.hashome_data = true
            state.home.companies = data.companies
            state.home.categories = data.companies
            state.home.cities  = data.cities
            state.home.districts = data.districts
            state.home.blogs = data.blogs
        },
        FETCH_SEARCH_HOME:(state, data)=> {
            data
        },
        FETCH_COMPANIES:(state, data)=> {
            state.hascompanies_data = true
            state.companies = data.companies
        },
        FETCH_DASHBOARD:(state, data)=> {
            state.hasdashboard_data = true
            
            data.boards.forEach(element => {
                element = element.value
            });
            state.dashboard.items = data.boards
            state.dashboard.token = data.token
            

            // console.log(state.dashboard.data )

        },
        MOVE_LEAD:(state, data)=> {
            var index = state.dashboard.items.findIndex(item => item.id == data.r_data.board_id)

            var idx;
            
            if(data.data.ident==0) 
                 idx = state.dashboard.items[index].leads.findIndex(item => item.order > data.r_data.order) - 1
            else
                 idx = state.dashboard.items[index].leads.findIndex(item => item.order > data.r_data.order)
            
            state.dashboard.items[index].leads.splice(idx, 0, data.data.item_target)
            // idx = state.dashboard.items[index].leads.findIndex(item => == )
            // state.dashboard.items[index].leads.splice()

        },
        SET_USER:(state, user)=> {
            state.user = user;
        }
    },
    actions: {
        fetchDashboardUpdates:({context, dispatch}, data)=> {
            
            let switchOptions = (option, details)=> {

                switch (option) {
                 case 0:
                   dispatch('boardCreateUpdates', details);
                   break;
                 case 1:
                   dispatch('boardUpdateUpdates', details);
                   break;
                  case 2:
                   dispatch('boardDeleteUpdates', details);
                   break; 
                 case 10:
                   dispatch('leadCreateUpdates', details);
                   break;
                 case 11:
                   dispatch('leadUpdateUpdates', details);
                   break;
                 case 12:
                   dispatch('leadDeleteUpdates', details);
                   break;
               
                 // default:
                   // break;
               } 
             }
             
             data.forEach(element => {
                try {
                    let details = JSON.parse("["+element.data+"]")
                
                    if(element.data != null)
                        details.forEach(detail => {
                            // console.log(detail)
                            switchOptions(element.event, detail)
                        });

                } catch (error) {
                     
                }
            }); 
                
            // context.commit('FETCH_DASHBOARD_UPDATES', data)
        },
        moveLead:(context, data)=> {
                        

            let url = `http://localhost:8000/api/update_boards/movelead/${data.item_target.id}/${data.item.board_id}/${data.item.id}/${data.item.order}/${data.ident}`;
            let config = {'headers': {}}
            let data1 = {}
            axios.put(url, data1, config).then(response=> {
                                
                context.commit('MOVE_LEAD', {r_data: response.data, data:data })
            });
        },
        fetchDashboard:(context, sockets)=> {
            
            let config = {'headers': {}}
            let url = `http://localhost:8000/api/dashboard`;
            axios.get(url, config).then(response=> {
                console.log(response.data.token)

                sockets.subscribe(response.data.token, (data) => {
                    
                    // console.log(data);
                    context.dispatch('fetchDashboardUpdates', data.updates);
                    console.log('wtfhithat');

                });
    
                context.commit('FETCH_DASHBOARD', response.data)
            });

        },
        async login(context, user) {
        
            let config = {'headers': {
                'Accept': 'application/json',
                'Content-Type': 'multipart/form-data'
                }
            }

            let url = 'http://localhost:8000/sanctum/csrf-cookie';
            
            await axios.get(url, {}).then(response=> {
                config.headers["X-XSRF-TOKEN"] = response.config.headers['X-XSRF-TOKEN']
                // config.headers["X-XSRF-TOKEN"] =

            });

            // var data = new FormData();
            // data.append('phone_number', '77026651625');
            // data.append('password', 'password');

            // config = {
            //     method: 'put',
            //     url: 'http://localhost:8000/api/auth',
            //     headers: { 
            //         // 'X-Requested-With': 'XMLHttpRequest',
            //      "X-CSRF-TOKEN": config.headers["X-XSRF-TOKEN"],
            //      'Accept': 'application/json',
            //      'Content-Type': 'application/json;charset=utf-8',
            //      'Access-Control-Allow-Origin' : '*'
            //     //   'Cookie': 'laravel_session=Mb6avHg3H8jxyspOxTozypGhzy24MPUu8NatZXAh'
            //     //   ...data.getHeaders()
            //     },
            //     data : data
            //   };


            // // axios.defaults.withCredentials = true;
            // axios(config).then(response=> {
            //     console.log(response)
            // }).catch(function (error) {
            //     // handle error
            //     console.log(error);
            //   })

            let cookieJar = new tough.CookieJar();

            let instance = axios.create({
                jar:cookieJar,
                withCredentials: true
                // httpsAgent: new https.Agent({ rejectUnauthorized: false, requestCert: true, keepAlive: true})
            });

            instance.defaults.headers['X-CSRF-TOKEN'] = config.headers["X-XSRF-TOKEN"]
            instance.defaults.headers['Accept'] = 'application/json'
            instance.post('http://localhost:8000/auth', user).then(response=>{ 
                console.log(response)
            });

            context.commit('SET_USER', user)
            sessionStorage.user = JSON.stringify(user);
        },
        fetchHome:(context)=> {
            let url = `http://localhost:8000/api/home`;
            let config = {'headers': {}}
            let data = {}
            axios.get(url, data, config).then(response=> {
                context.commit('FETCH_HOME', response.data)
            });
        },
        fetchSearchHome:(context)=> {
          
            let url = `http://localhost:8000/api/home`;
            let config = {'headers': {}}
            let data = {
                cityID: home.searchForm.cityID,
                destrictID: home.searchForm.destrictID,
                categoryID: home.searchForm.categoryID
            }
            
            axios.get(url, data, config).then(response=> {
                context.commit('FETCH_SEARCH_HOME', response.data)
            });
        },
        fetchCompanies:(context)=> {
            
            let config = {'headers': {}}
            let url = `http://localhost:8000/api/companies`;
            axios.get(url, config).then(response=> {
                context.commit('FETCH_COMPANIES', response.data)
            });
        },
       
        boardCreateUpdates:(context, details) => {
            context.commit('CREATE_BOARD_UPDATE', details)
        },
        boardUpdateUpdates:(context, details) => {
            context.commit('UPDATE_BOARD_UPDATE', details)
        },
        boardDeleteUpdates:(context, details) => {
            context.commit('DELETE_BOARD_UPDATE', details)
        },
        leadCreateUpdates:(context, details) => {
            console.log('lead create')
            context.commit('CREATE_LEAD_UPDATE', details)
        },
        leadUpdateUpdates:(context, details) => {
            context.commit('UPDATE_LEAD_UPDATE', details)
        },
        leadDeleteUpdates:(context, details) => {
            context.commit('DELETE_LEAD_UPDATE', details)
        },
        swapBoards:(context, data) => {
            context.commit('SWAP_BOARDS', data)
        },
        editBoard:(context, data) => {
            let config = {'headers': {}}
            let url = `http://localhost:8000/api/update_boards/updateboard/${data.item.id}/newtitle/${data.value}`;
            axios.put(url, config).then(response=> {

                console.log(response.data)
                context.commit('UPDATE_BOARD', data)
            });
        },
        boardCreate:(context, title) => {
            let config = {'headers': {
                'Accept': 'application/json'
            }}
            // console.log(`http://localhost:8000/api/update_boards/newboard=${title}`)
            let url = `http://localhost:8000/api/update_boards/newboard/${title}`;

            axios.get(url, config).then(response=> {
                if(response.status == 200)
                    context.commit('CREATE_BOARD', response.data)
                // console.log(response.data)
            });
        },
        boardDelete:(context, data) => {
            let config = {'headers': {
                'Accept': 'application/json'
            }}
            // console.log(`http://localhost:8000/api/update_boards/newboard=${title}`)
            let url = `http://localhost:8000/api/update_boards/removeboard/${data.item.id}`;
            axios.put(url, config).then(response=> {
                if(response.status == 200)
                context.commit('REMOVE_BOARD', data.item)
            });

        },
        createLead:(context, data) => {
            let config = {'headers': {
                'Accept': 'application/json'
            }}
            let url = `http://localhost:8000/api/update_boards/createlead/${data.item.id}/newleaddescription/${data.value}`;

            axios.get(url, config).then(response=> {
                if(response.status == 200)
                data.id = response.data.id
                data.created_at = response.data.created_at
                data.updated_at = response.data.updated_at
                context.commit('CREATE_LEAD', data)
            });


        },
        deleteLead:(context, data) => {
            let config = {'headers': {
                'Accept': 'application/json'
            }}
            let url = `http://localhost:8000/api/update_boards/removelead/${data.lead.id}`;
            // console.log(url)
            axios.put(url, config).then(response=> {
                if(response.status == 200)
                    context.commit('REMOVE_LEAD', data)
            });


        },
        saveLead:(context, data) => {
            let config = {'headers': {
                'Accept': 'application/json'
            }}

            let url = `http://localhost:8000/api/update_boards/updatelead/${data.lead.id}/description/${data.value}`;
            // console.log(url)
            axios.put(url, config).then(response=> {
                if(response.status == 200)
                    context.commit('UPDATE_LEAD', data )
            });

        },
        otherAction: (context, type) => {
          context
          type
            return true;
        },
        socket_userMessage: (context, message) => {
            context.dispatch('newMessage', message);
            context.commit('NEW_MESSAGE_RECEIVED', message);
            if (message.is_important) {
                context.dispatch('alertImportantMessage', message);
            }
        }
    }
})

