<template>
  <div class="resto-group__wrapper mb-5">
    <div class="row">
      <div class="col-md-4 mb-4" v-for="resto in localResto" :key="resto.id">
        <card-component>
          <template slot="title">{{resto.name}}</template>
          <template slot="body">
            <div class="content-container"> 
              <i class="fas fa-map-marker-alt"></i> {{resto.location}}
              <br>
              <i class="fas fa-table"></i> {{resto.tables}}
            </div>
            <a class="card-link" v-bind:href="resto.slug">Menu</a>
            <a class="card-link" v-bind:href="resto.ordersSlug">Orders</a>
          </template>
        </card-component>
      </div>
      <div class="col-md-4" v-if="showAddForm">
        <card-component>
          <template slot="title">Add new Restaurant</template>
          <template slot="body">
              <div class="newResto">
                <span @click="handleAddNewResto"><i class="fas fa-plus-circle"></i></span>
              </div>
          </template>
        </card-component>
        <modal name="add-new-resto" height="auto">
            <div class="container-padding">
                <AddRestoForm 
                @addRestoEvent="handleSaveResto"
                @modalCancel="handleCancelResto"></AddRestoForm>
            </div>
        </modal>
      </div>
    </div>
  </div>
</template>

<script>
import AddRestoForm from './RestoAddForm.vue';
import axios from 'axios';
export default {
    components : {
        AddRestoForm
    },
    props: ['restos'],
    created() {
        this.localResto = this.restos;
    },
    computed: {
        showAddForm() {
        return (this.localResto.length < 5) ? true : false;
        }
    },
    data() {
        return {
            localResto: []
        }
    },
    methods: {
        handleAddNewResto () {
            this.$modal.show('add-new-resto');
        },
        handleCancelResto () {
            this.$modal.hide('add-new-resto');
        },
        handleSaveResto(restoData) {
            axios.post('/api/resto', restoData).then(response => {
                this.localResto.unshift(response.data);
                this.$modal.hide('add-new-resto');
            });
        }
    }
}
</script>
<style scoped>
.fa-plus-circle {
  font-size: -webkit-xxx-large;
}
.newResto {
  text-align: center;
}
.content-container {
  padding-block-end: inherit;
}

</style>

