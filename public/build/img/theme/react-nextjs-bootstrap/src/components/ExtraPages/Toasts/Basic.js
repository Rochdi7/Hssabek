"use client";

import { Card, Toast } from "react-bootstrap";
import Image from "next/image";

const Basic = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <div className="mb-3 mb-lg-4">
            <h3 className="mb-0">Basic</h3>
          </div>

          <Toast>
            <Toast.Header>
              <Image src="/images/holder1.svg" className="rounded me-2" alt="holder1" width={20} height={20} />
              <strong className="me-auto">Bootstrap</strong>
              <small>11 mins ago</small>
            </Toast.Header>
            <Toast.Body>Hello, world! This is a toast message.</Toast.Body>
          </Toast>
        </Card.Body>
      </Card>
    </>
  );
};

export default Basic;
