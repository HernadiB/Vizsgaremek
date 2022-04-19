using AdminInterface.Entities.Levels;

namespace AdminInterface.Entities.Levels
{
    public class LevelPutPost
    {
        public string name { get; set; }
        public LevelPutPost() { }
        public LevelPutPost(string name)
        {
            this.name = name;
        }
    }
}
