( function( api ) {

	// Extends our custom "refined-magazine" section.
	api.sectionConstructor['refined-magazine'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );
