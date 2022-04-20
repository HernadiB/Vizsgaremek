using System;

namespace AdminInterface.Entities.Users
{
    public class UserEntity
    {
        public int ID { get; set; }
        public string FullName { get; set; }
        public string Username { get; set; }
        public DateTime Birthdate { get; set; }
        public string Gender { get; set; }
        public string Email { get; set; }
        public string Role { get; set; }
        public string ProfilePicture { get; set; }
        public string Team { get; set; }
        public int? Score { get; set; }
        public string Level { get; set; }
        public UserEntity() { }
        public UserEntity(int id, string fullname, string username, DateTime birthdate, string gender, string email, string role, string profilepicture, string team, int score, string level)
        {
            ID = id;
            FullName = fullname;
            Username = username;
            Birthdate = birthdate;
            Gender = (gender == "F") ? "Nő" : "Férfi";
            Email = email;
            Role = role;
            ProfilePicture = profilepicture;
            Team = team;
            Score = score;
            Level = level;
        }
    }
}
