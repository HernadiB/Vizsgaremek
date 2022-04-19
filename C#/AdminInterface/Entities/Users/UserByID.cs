namespace AdminInterface.Entities.Users
{
    public class UserByID
    {
        public UserEntity data { get; set; }
        public UserByID() { }
        public UserByID(UserEntity user)
        {
            data = user;
        }
    }
}
