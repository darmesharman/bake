import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex);

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
        updates:null

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
            state.items[data.colidx].leads.push({
                id:data.id,
                board_id: data.item.id,
                description: data.value,
                created_at: data.created_at,
                updated_at: data.updated_at
            })
        },
        REMOVE_LEAD:(state, data)=> {
            // state.items
            // let index = state.items[data.colidx].leads[data.leadidx]
            state.items[data.colidx].leads.splice(data.leadidx, 1)
        },
        UPDATE_LEAD:(state, data)=> {
            let index = state.items[data.colidx].leads.findIndex(y => y.id == data.lead.id)
            state.items[data.colidx].leads[index].description = data.value
        },
        CREATE_BOARD:(state, data)=> {
            state.items.push({id:data.id, title: data.title, order: data.order, leads: [], created_at:data.created_at, updated_at:data.updated_at})
        },
        REMOVE_BOARD:(state, item)=> {
            let index = state.items.findIndex(y => y.id == item.id)
            state.items.splice(index, 1)
        },
        UPDATE_BOARD:(state, data)=> {
            let index = state.items.findIndex(y => y.id == data.item.id)
            state.items[index].title = data.value
        },
        SWAP_BOARDS:(state, data)=> {
            var index = state.items.findIndex(item => item.id == data.itemid)
            var index2 = state.items.findIndex(item => item.id == data.itemid2)
            let rows = [state.items[index], state.items[index2]];
            state.items.splice(index2, 1, rows[0] );
            state.items.splice(index, 1, rows[1] );
        },
        CREATE_BOARD_UPDATE:(state, details)=> {
            // let index = state.items.findIndex(y => y.id == data.item.id)
            state.items.push({ id:details.id, order:details.order,
                title:details.title, created_at:details.created_at, updated_at:details.updated_at, leads:[]})
        },
        UPDATE_BOARD_UPDATE:(state, details)=> {

            let index = state.items.findIndex(y => y.id == details.id)

                state.items[index].order = details.order
                state.items[index].title = details.title
                state.items[index].updated_at = details.updated_at
        },
        DELETE_BOARD_UPDATE:(state, details)=> {
            let index = state.items.findIndex(y => y.id == details.id)
            state.items.splice(index, 1)
            // state.items.push({ id:details.id,
                // title:details.title, order:details.order, updated_at:details.updated_at})
        },
        CREATE_LEAD_UPDATE:(state, details)=> {
            let index = state.items.findIndex(y => y.id == details.board_id)
            state.items[index].leads.push({
                id:details.id,
                board_id: details.board_id,
                description: details.description,
                created_at: details.created_at,
                updated_at: details.updated_at
            })
        },
        UPDATE_LEAD_UPDATE:(state, details)=> {
            let index = state.items.findIndex(y => y.id == details.board_id)
            let idx = state.items[index].leads.findIndex(y => y.id == details.id)
            state.items[index].leads[idx].description = details.description
            updated_at = details.updated_at
        },
        DELETE_LEAD_UPDATE:(state, details)=> {
            let index = state.items.findIndex(y => y.id == details.board_id)
            let idx = state.items[index].leads.findIndex(y => y.id == details.id)
            console.log(idx)
            state.items[index].leads.splice(idx, 1)
        },
    },
    actions: {
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

