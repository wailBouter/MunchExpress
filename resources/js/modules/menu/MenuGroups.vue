<template>
  <div class="section">
    <div class="table table-hover">
      <thead>
        <tr>
          <th>Name &amp; description</th>
          <th>Price</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(item, key) in items" :key="key">
          <td>
            <strong v-text="item.name"></strong>
            <p v-text="item.description"></p>
          </td>
          <td>
            <span v-text="item.price"></span>
          </td>
        </tr>
      </tbody>
    </div>
  </div>
</template>

<script>
  export default {
      props: ['items']
  }

</script>

<style>

</style>
