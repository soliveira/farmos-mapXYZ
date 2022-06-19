(function () {
  farmOS.map.behaviors.xyz = {
    attach: function (instance) {
      var xyz_url = drupalSettings.farm_map.behaviors.xyz.xyz_url;
      this.addXyzLayer(instance, 'Custom Layer', xyz_url, true);
    },
    addXyzLayer: function (instance, title, xyz_url, visible = false) {

      // Add the layer.
      var opts = {
        title: title,
        url: xyz_url,
        tileSize: 512,
        group: 'Base layers',
        base: true,
        visible: visible,
      };
      instance.addLayer('xyz', opts);
    }
  };
}());
