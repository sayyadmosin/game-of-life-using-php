# game-of-life-using-php
Conway's Game Of Life In PHP

## Instructions
To run this simulation:
1. Run it from the command line: `php game_of_life.php`
2. Press Ctrl+C to stop the simulation

## Features
- 25x50 grid size (appears square in terminal due to character spacing)
- Random initial state
- Uses '█' for live cells and '.' for dead cells
- Updates every 100ms (adjustable via usleep())

## Rules
Follows Conway's Game of Life rules:
- Any live cell with < 2 neighbors dies (underpopulation)
- Any live cell with 2-3 neighbors survives
- Any live cell with > 3 neighbors dies (overpopulation)
- Any dead cell with exactly 3 neighbors becomes alive
