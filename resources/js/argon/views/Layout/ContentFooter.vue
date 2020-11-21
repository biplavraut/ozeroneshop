<template>
  <footer class="footer px-4">
    <b-row align-v="center" class="justify-content-lg-between">
      <b-col lg="6">
        <div class="copyright text-center text-lg-left text-muted">
          © 2020 - {{year}} <a href="https://www.biplavrajraut.com.np" class="font-weight-bold ml-1" target="_blank">Biplav</a>
        </div>
      </b-col>
      <b-col lg="6">
        <b-nav align="center" class="nav-footer justify-content-lg-end">
          <b-nav-item href="https://www.ozeroneshop.com"  target="_blank">
            Ozerone Shop
          </b-nav-item>
          <b-nav-item href="https://www.perscreation.com" target="_blank">
           Pers Creation
          </b-nav-item>
        </b-nav>
      </b-col>
    </b-row>
  </footer>
</template>
<script>
export default {
  data() {
    return {
      year: new Date().getFullYear()
    };
  }
};
</script>
<style></style>
