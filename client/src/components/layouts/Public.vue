<template>
  <div class="index">
    <v-app light>
      <v-toolbar color="#aa2e25" dark tabs>
        <v-toolbar-title>Home</v-toolbar-title>
        <v-spacer></v-spacer>
        <v-toolbar-items>
          <v-btn icon title="Página inicial">
            <v-icon>mdi-login-variant</v-icon>
          </v-btn>
          <v-btn icon title="Submissão de artigos">
            <router-link :to="{ name: 'Submissao'}">
              <v-icon>cloud_upload</v-icon>
            </router-link>
          </v-btn>
        </v-toolbar-items>
        <v-menu offset-y>
          <v-icon slot="activator" icon>mdi-dots-vertical</v-icon>
          <v-list>
            <v-list-tile v-for="(item, index) in menu" :key="index" @click="">
              <router-link :to="{ name: item.route.name, params: {} }">
                <v-list-tile-title>
                  <v-icon>{{item.icon}}</v-icon> {{ item.title }}
                </v-list-tile-title>
              </router-link>
            </v-list-tile>
          </v-list>
        </v-menu>
      </v-toolbar>
      <v-content>
        <section>
          <v-parallax :src="require('@/assets/background.png')" height="600">
            <router-view></router-view>
          </v-parallax>
        </section>
      </v-content>
      <v-footer height="auto" class="red darken-2">
        <v-layout row wrap justify-center>
          <v-flex xs12 py-3 text-xs-center white--text>
            &copy;{{$project.year}} —
            <strong>{{$project.title}}</strong>. Desenvolvido por <a v-for="dev in $project.devs" class="white--text" :href="dev.link" target="_blank">{{dev.name}}</a>
          </v-flex>
        </v-layout>
      </v-footer>
    </v-app>
  </div>
</template>

<script>
export default {
  name: 'public',
  data () {
    return {
      menu: [
        {
          title: 'Página inicial',
          icon: 'home',
          route: {
            name: 'Index'
          }
        },
        {
          title: 'Sobre o CONNEPI',
          icon: 'info',
          route: {
            name: ''
          }
        },
        {
          title: 'Comunidades e coleções',
          icon: 'group',
          route: {
            name: ''
          }
        },
        {
          title: 'Downloads',
          icon: 'cloud_download',
          route: {
            name: ''
          }
        },
        {
          title: 'Estatísticas',
          icon: 'mdi-chart-line',
          route: {
            name: ''
          }
        }
      ]
    }
  }
}
</script>

<style>
a {
  text-decoration: none;
}
button a {
  color: #fff !important;
}
</style>
