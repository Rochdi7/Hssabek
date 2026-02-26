"use client";

import { Card } from "react-bootstrap";

const MapRounded = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <h4 className="fs-18 mb-4">Map Rounded</h4>
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d193595.25422093368!2d-74.14482958793613!3d40.69763074439564!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2sbd!4v1702372090194!5m2!1sen!2sbd"
            style={{
              border: "0",
              borderRadius: '20px',
              width: "100%",
              display: "block",
              height: "400px",
            }}
            allowFullScreen=""
            loading="lazy"
            referrerPolicy="no-referrer-when-downgrade"
          ></iframe>
        </Card.Body>
      </Card>
    </>
  );
};

export default MapRounded;
