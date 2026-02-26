"use client";

import { Card } from "react-bootstrap";
import Link from "next/link";
import Image from "next/image"; 

const Congratulations = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4 position-relative">
        <Card.Body className="p-4">
          <h3 className="mb-0">
            Congratulations, <span className="text-primary">Olivia!</span>
          </h3>

          <p>Best agent of the month</p>

          <h3 className="mb-0 fs-20 text-primary">1.5k+</h3>

          <p>Ticket Solved</p>

          <Link href="/my-profile" className="btn btn-primary fw-medium">
            View Profile
          </Link>
        </Card.Body>

        <Image
          src="/images/congratulations.gif"
          className="congratulations wh-150 position-absolute"
          alt="congratulations"
          width={305}
          height={314}
        />
      </Card>
    </>
  );
};

export default Congratulations;
