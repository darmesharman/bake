
import Vue from 'vue';
import io from "socket.io-client";
import VueSocketIO from 'vue-socket.io'
import store from './store'

const options = {
  debug: false,
  transports : ['websocket'],//, 'polling', 'flashsocket'
  'load-on-start': false,

}

export default new VueSocketIO({
    debug: true,
    connection: io('http://localhost:4000', options), //options object is Optional
    vuex: {
      store,
      actionPrefix: "SOCKET_",
      mutationPrefix: "SOCKET_"
    }
  })


