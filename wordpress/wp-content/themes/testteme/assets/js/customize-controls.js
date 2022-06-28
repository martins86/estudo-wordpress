(function ($, api) {
  /* === Upsell Section === */
  api.sectionConstructor["test-teme-upsell"] = api.Section.extend({
    // No events for this type of section.
    attachEvents: function () {},

    // Always make the section active.
    isContextuallyActive: function () {
      return true;
    },
  });
})(jQuery, wp.customize);
