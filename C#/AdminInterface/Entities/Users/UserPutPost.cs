namespace AdminInterface.Entities.Users
{
    public class UserPutPost
    {
        public int User_id { get; set; }
        public string Name { get; set; }
        public UserPutPost() { }
        public UserPutPost(int user_id, string name)
        {
            User_id = user_id;
            this.Name = name;
        }
    }
}
