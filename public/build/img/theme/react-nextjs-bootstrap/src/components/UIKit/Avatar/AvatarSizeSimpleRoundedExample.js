"use client";

import { Card } from "react-bootstrap";
import Image from "next/image"; 

const AvatarSizeSimpleRoundedExample = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <h4 className="fs-18 mb-4">Avatar Size Simple Rounded Example</h4>

          <div className="d-flex align-items-center gap-4 flex-wrap">
            <Image
              src="/images/screenshorts.jpg"
              className="wh-87 rounded-3"
              alt="screenshorts"
              width={87}
              height={87}
            />
            <Image
              src="/images/screenshorts.jpg"
              className="wh-77 rounded-3"
              alt="screenshorts"
              width={77}
              height={77}
            />
            <Image
              src="/images/screenshorts.jpg"
              className="wh-67 rounded-3"
              alt="screenshorts"
              width={67}
              height={67}
            />
            <Image
              src="/images/screenshorts.jpg"
              className="wh-57 rounded-3"
              alt="screenshorts"
              width={57}
              height={57}
            />
            <Image
              src="/images/screenshorts.jpg"
              className="wh-47 rounded-3"
              alt="screenshorts"
              width={47}
              height={47}
            />
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default AvatarSizeSimpleRoundedExample;
