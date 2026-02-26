"use client";

import { Card } from "react-bootstrap";

const EventInfo = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <h3 className="mb-3 mb-lg-4">Event Info</h3>

          <span className="d-block mb-3">
            <span className="text-secondary">08:00 AM</span> - Registration
          </span>

          <span className="d-block mb-3">
            <span className="text-secondary">09:00 AM</span> - Opening Keynote
          </span>

          <span className="d-block mb-3">
            <span className="text-secondary">10:30 AM</span> - Panel Discussion:
            Future Trends
          </span>

          <span className="d-block mb-3">
            <span className="text-secondary">12:00 PM</span> - Lunch Break
          </span>

          <span className="d-block mb-3">
            <span className="text-secondary">02:00 PM</span> - Interactive
            Workshops
          </span>

          <span className="d-block mb-3">
            <span className="text-secondary">04:30 PM</span> - Networking
            Reception
          </span>

          <h3 className="mb-3 mb-lg-3 pt-2">Registration Information</h3>
          <span className="d-block mb-2">
            Early Bird Registration Deadline: 15 November 2024
          </span>
          
          <span className="d-block mb-2">
            Standard Registration Deadline: 30 November 2024
          </span>
        </Card.Body>
      </Card>
    </>
  );
};

export default EventInfo;
