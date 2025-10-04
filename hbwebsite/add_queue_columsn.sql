-- Add queue-related columns to reservations table
-- Run this SQL in your database

-- Add queued column (0 = confirmed booking, 1 = queued booking)
ALTER TABLE reservations 
ADD COLUMN IF NOT EXISTS queued TINYINT(1) DEFAULT 0 AFTER status;

-- Add queue_position column (position in queue, 0 if not queued)
ALTER TABLE reservations 
ADD COLUMN IF NOT EXISTS queue_position INT DEFAULT 0 AFTER queued;

-- Add index for better performance on queue queries
ALTER TABLE reservations 
ADD INDEX idx_room_dates_queue (room_id, checkin, checkout, queued, status);

-- View current queue status for all rooms
SELECT 
  room_id,
  COUNT(CASE WHEN queued = 0 AND status IN ('confirmed', 'pending', 'checked_in') THEN 1 END) as confirmed_bookings,
  COUNT(CASE WHEN queued = 1 AND status IN ('confirmed', 'pending', 'queued') THEN 1 END) as queued_bookings,
  checkin,
  checkout
FROM reservations
GROUP BY room_id, checkin, checkout
ORDER BY room_id, checkin;