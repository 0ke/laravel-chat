<template>
    <nav :id="id" class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li v-if="menu.submenus" :class="{dropdown:menu.submenus}" v-for="menu in menus" key="menu.id">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ menu.title }}<span class="caret"></span></a>
                        <ul  class="dropdown-menu">
                            <li v-for="submenu in menu.submenus" key="submenu.id">
                                <a href="#" @click.prevent="fire(submenu.action)">
                                    {{ submenu.title }}
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li v-else=""><a href="#" @click.prevent="fire(submenu.action)">{{ menu.title }}</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</template>

<script>
    export default {
        props : ['menus', 'id'],
        methods: {
            fire(method){
                this.$emit('fired',method);
            }
        }
    }
</script>
