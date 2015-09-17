var registration = {

	department : '',
	init : function(){

		this.cacheDom();
		this.bindEvents();

	},
	cacheDom : function(){
		this.$signup_container = $('#signup_container');
		this.$register_departments = this.$signup_container.find('#register_departments');
		this.$course = this.$signup_container.find('#register_courses');

	},
	bindEvents : function(){

		this.$register_departments.on('change',this.departmentChanged.bind(this));

	},
	departmentChanged : function(){

		if(this.$register_departments.val() === '5' || this.$register_departments.val() === '6'){

			//this.$course.prop('disabled', true);
			this.$course.val(1);

		} else {

			//this.$course.prop('disabled', false);

		}
	}


};

registration.init();