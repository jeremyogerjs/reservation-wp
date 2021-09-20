( function( api ) {

	// Extends our custom "real-fitness" section.
	api.sectionConstructor['real-fitness'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );