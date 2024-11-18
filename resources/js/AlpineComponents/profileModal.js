export default function profileModal ()
{
    return {
        isModalOpen : false,
        modal : null,
        formElement : null,
        errors : {},
        success : "",

        init ()
        {
            this.modal = document.getElementById ('profile-modal');
            this.formElement = document.getElementById ('profile_form');
        },

        open ()
        {
            this.modal.classList.remove ('hidden');
            this.isModalOpen = true;
        },

        close ()
        {
            this.modal.classList.add ('hidden');
            this.isModalOpen = false;
            this.success = "";
            this.errors = {};
        },

        async updateProfile ()
        {
            this.errors = {};
            this.success = "";
            const formData = new FormData (this.formElement);

            try
            {
                const response = await axios.put ('/user/update', formData);
                if (response.status === 200)
                {
                    this.success = response.data.message;
                }
            } catch (error)
            {
                if (error.response && error.response.status === 422)
                {
                    this.errors = error.response.data.errors;
                } else
                {
                    console.error (error);
                }
            }
        }
    }
}
