using System.Collections.Generic;

namespace AdminInterface.Entities.Levels
{
    public class LevelAll
    {
        public List<LevelEntity> data { get; set; }
        public LevelAll() { }
        public LevelAll(List<LevelEntity> levels)
        {
            data = levels;
        }
    }
}
