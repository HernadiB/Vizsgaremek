using System.Collections.Generic;

namespace AdminInterface.Entities.Users
{
    public class UserAll
    {
        public List<UserEntity> data { get; set; }
        public UserAll() { }
        public UserAll(List<UserEntity> data)
        {
            this.data = data;
        }
    }
}
