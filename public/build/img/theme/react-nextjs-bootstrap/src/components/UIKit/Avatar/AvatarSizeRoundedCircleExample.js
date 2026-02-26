"use client";

import { Card } from "react-bootstrap";
import Image from "next/image";  

const AvatarSizeRoundedCircleExample = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <h4 className="fs-18 mb-4">Avatar Size Rounded-Circle Example</h4>

          <div className="d-flex align-items-center gap-4 flex-wrap">
            <Image
              src="/images/user-68.jpg"
              className="wh-87 rounded-circle"
              alt="user"
              width={87}
              height={87}
            />
            <Image
              src="/images/user-68.jpg"
              className="wh-77 rounded-circle"
              alt="user"
              width={77}
              height={77}
            />
            <Image
              src="/images/user-68.jpg"
              className="wh-67 rounded-circle"
              alt="user"
              width={67}
              height={67}
            />
            <Image
              src="/images/user-68.jpg"
              className="wh-57 rounded-circle"
              alt="user"
              width={57}
              height={57}
            />
            <Image
              src="/images/user-68.jpg"
              className="wh-47 rounded-circle"
              alt="user"
              width={47}
              height={47}
            />
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default AvatarSizeRoundedCircleExample;
