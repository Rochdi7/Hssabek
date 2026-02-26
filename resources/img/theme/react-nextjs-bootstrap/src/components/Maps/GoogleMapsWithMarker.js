"use client";

import { Card } from "react-bootstrap";

const GoogleMapsWithMarker = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <h4 className="fs-18 mb-4">Google Maps With Marker</h4>
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2961.531787331029!2d-79.71907682343104!3d42.074654353084405!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8832a0137e6fd47f%3A0x802a0941babde103!2sNY-426%2C%20New%20York%2C%20USA!5e0!3m2!1sen!2sbd!4v1719813840877!5m2!1sen!2sbd"
            style={{
              border: "0",
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

export default GoogleMapsWithMarker;
