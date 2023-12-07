<template>
    <div class="loader"></div>
</template>
<script>
export default {
    name: "LoadingSpinner",
};
</script>
<style>
.loader {
  position: relative;
  width: 100px;
  height: 100px;
  overflow: hidden;
  border-radius: 50%;
  animation: circleAnimation 1.5s linear infinite;
}

.loader::before,
.loader::after {
  content: "";
  position: absolute;
}

.loader::before {
  inset: 10px;
  background: rgba(233, 30, 99, 0.05);
  border-radius: 50%;
  backdrop-filter: blur(10px);
  border: 1px solid rgba(255, 255, 255, 0.1);
  z-index: 1;
}

.loader::after {
  top: -50%;
  left: -50%;
  width: 100%;
  height: 100%;
  background: linear-gradient(90deg, #383bdb 0%, #3220d7 100%) !important;
}

@keyframes circleAnimation {
  from {
    transform: rotate(0deg);
  }
  to {
    transform: rotate(360deg);
  }
}

</style>