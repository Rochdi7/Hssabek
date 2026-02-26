"use client";

import React, { useState } from "react";
import { Card, Form, Toast, ToastContainer } from "react-bootstrap";
import Image from "next/image";

const Placement = () => {
  const [position, setPosition] = useState("top-start");

  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <div className="mb-3 mb-lg-4">
            <h3 className="mb-0">Placement</h3>
          </div>

          <div className="mb-3">
            <label htmlFor="selectToastPlacement">Toast position</label>
            <Form.Select
              id="selectToastPlacement"
              className="mt-2"
              onChange={(e) => setPosition(e.currentTarget.value)}
            >
              {[
                "top-start",
                "top-center",
                "top-end",
                "middle-start",
                "middle-center",
                "middle-end",
                "bottom-start",
                "bottom-center",
                "bottom-end",
              ].map((p) => (
                <option key={p} value={p}>
                  {p}
                </option>
              ))}
            </Form.Select>
          </div>

          <div
            aria-live="polite"
            aria-atomic="true"
            className="bg-dark position-relative"
            style={{ minHeight: "240px" }}
          >
            <ToastContainer
              className="p-3"
              position={position}
              style={{ zIndex: 1 }}
            >
              <Toast>
                <Toast.Header closeButton={false}>
                  <Image
                    src="/images/holder1.svg"
                    className="rounded me-2"
                    alt="holder1"
                    width={20}
                    height={20}
                  />
                  <strong className="me-auto">Bootstrap</strong>
                  <small>11 mins ago</small>
                </Toast.Header>
                <Toast.Body>Hello, world! This is a toast message.</Toast.Body>
              </Toast>
            </ToastContainer>
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default Placement;
