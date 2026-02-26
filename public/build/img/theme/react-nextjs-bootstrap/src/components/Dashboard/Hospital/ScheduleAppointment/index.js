"use client";

import { Card, Button } from "react-bootstrap";
import Image from "next/image";

const ScheduleAppointment = () => {
  return (
    <>
      <Card
        className="border-0 rounded-3 mb-4"
        style={{ backgroundColor: "#7C24CC" }}
      >
        <Card.Body className="p-4 py-5 p-xl-5 text-center">
          <h2 className="text-white fs-24 fw-semibold mb-2">
            Schedule Appointment
          </h2>

          <p className="text-white fs-14 m-auto" style={{ maxWidth: "273px" }}>
            Quickly schedule an appointment for a patient with any available
            doctor
          </p>

          <div className="py-4 mb-2">
            <Image
              src="/images/schedule.png"
              alt="schedule"
              width={175}
              height={186}
            />
          </div>

          <Button
            type="button"
            className="btn btn-primary py-2 px-4 fs-16 fw-medium text-white"
          >
            Book Appointment
          </Button>
        </Card.Body>
      </Card>
    </>
  );
};

export default ScheduleAppointment;
