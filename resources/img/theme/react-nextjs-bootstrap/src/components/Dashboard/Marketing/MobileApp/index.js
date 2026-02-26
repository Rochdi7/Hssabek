"use client";

import { Card } from "react-bootstrap";
import Image from "next/image";

const MobileApp = () => {
  return (
    <>
      <div
        className="border-0 rounded-3 mb-4 text-center"
        style={{
          background: "linear-gradient(150deg, #827CD8 0.57%, #2D2761 95.93%)",
        }}
      >
        <Card.Body className="p-4 text-center">
          <span className="fs-24 d-block text-white">Have You Tried Our</span>

          <h3 className="fs-24 text-white">New Mobile App?</h3>

          <div className="py-4 mb-3">
            <Image src="/images/app.png" alt="app" width={240} height={214} />
          </div>

          <a
            href="#"
            className="d-inline-block py-2 px-3 btn btn-primary"
            target="_blank"
          >
            Download Mobile App
          </a>
        </Card.Body>
      </div>
    </>
  );
};

export default MobileApp;
