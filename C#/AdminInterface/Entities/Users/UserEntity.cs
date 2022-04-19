namespace AdminInterface.Entities.Users
{
    public class UserEntity
    {
        public int ID { get; set; }
        public string FullName { get; set; }
        public string Username { get; set; }
        public string Email { get; set; }
        public string Role { get; set; }
        public string ProfilePicture { get; set; }
        public int Team { get; set; }
        public int Score { get; set; }
        public int Level { get; set; }
        public UserEntity() { }
        public UserEntity(int id, string fullname, string username, string email, string role, string profilepicture, int team, int score, int level)
        {
            ID = id;
            FullName = fullname;
            Username = username;
            Email = email;
            Role = role;
            ProfilePicture = profilepicture;
            Team = team;
            Score = score;
            Level = level;
        }
    }
}
