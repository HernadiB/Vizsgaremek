using AdminInterface.Entities.Levels;

namespace AdminInterface.Entities.Levels
{
    public class LevelPutPost
    {
        public string Name { get; set; }
        public LevelPutPost() { }
        public LevelPutPost(string name)
        {
            this.Name = name;
        }
    }
}
