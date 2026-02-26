"use client";

import { Card, Toast } from "react-bootstrap";
import Image from "next/image";

const Contextual = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <div className="mb-3 mb-lg-4">
            <h3 className="mb-0">Contextual</h3>
          </div>

          {[
            'Primary text-white',
            'Secondary text-white',
            'Success text-white',
            'Danger text-white',
            'Warning text-white',
            'Info text-white',
            'Light',
            'Dark',
          ].map((variant, idx) => (
            <Toast
              className="d-inline-block m-1"
              bg={variant.toLowerCase()}
              key={idx}
            >
              <Toast.Header>
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

              <Toast.Body className={variant === 'Dark' && 'text-white'}>
                Hello, world! This is a toast message.
              </Toast.Body>
            </Toast>
          ))}
        </Card.Body>
      </Card>
    </>
  );
};

export default Contextual;
