"use client";
   
import { Row, Col, Breadcrumb } from "react-bootstrap";
import SingleUserExample from "@/components/UIKit/Avatar/SingleUserExample";
import GroupUserExample from "@/components/UIKit/Avatar/GroupUserExample";
import SingleUserWithBadgeExample from "@/components/UIKit/Avatar/SingleUserWithBadgeExample";
import AvatarSizeRoundedCircleExample from "@/components/UIKit/Avatar/AvatarSizeRoundedCircleExample";
import AvatarSizeSimpleRoundedExample from "@/components/UIKit/Avatar/AvatarSizeSimpleRoundedExample";
import AvatarTextSizeRoundedCircleExample from "@/components/UIKit/Avatar/AvatarTextSizeRoundedCircleExample";
import AvatarTextSizeSimpleRoundedExample from "@/components/UIKit/Avatar/AvatarTextSizeSimpleRoundedExample";
  
export default function Page() {
  return (
    <>
      <div className="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-4">
        <h3 className="mb-0">Avatar</h3>
 
        <Breadcrumb className="breadcrumb-page-list align-items-center mb-0 lh-1">
          <Breadcrumb.Item href="/dashboard/ecommerce/">
            <div className="d-flex align-items-center text-decoration-none">
              <i className="ri-home-4-line fs-18 text-primary me-1"></i>
              <span className="text-secondary fw-medium hover">Dashboard</span>
            </div>
          </Breadcrumb.Item>

          <Breadcrumb.Item>
            <span className="fw-medium">UI Elements</span>
          </Breadcrumb.Item>

          <Breadcrumb.Item active>
            <span className="fw-medium">Avatar</span>
          </Breadcrumb.Item>
        </Breadcrumb>
      </div>

      <Row>
        <Col md={12} lg={6} xl={6} xxl={4}>
          <SingleUserExample />
        </Col>

        <Col md={6} lg={6} xl={6} xxl={4}>
          <GroupUserExample />
        </Col>

        <Col md={6} lg={6} xl={6} xxl={4}>
          <SingleUserWithBadgeExample />
        </Col>
      </Row>

      <Row>
        <Col lg={6}>
          <AvatarSizeRoundedCircleExample />

          <AvatarTextSizeRoundedCircleExample />
        </Col>

        <Col lg={6}>
          <AvatarSizeSimpleRoundedExample />

          <AvatarTextSizeSimpleRoundedExample />
        </Col>
      </Row>
    </>
  );
}
