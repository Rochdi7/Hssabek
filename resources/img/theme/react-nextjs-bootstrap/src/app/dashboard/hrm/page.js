import EmployeeAttendanceTrends from "@/components/Dashboard/HRM/EmployeeAttendanceTrends";
import EmployeeLeaveRequest from "@/components/Dashboard/HRM/EmployeeLeaveRequest";
import EmployeeList from "@/components/Dashboard/HRM/EmployeeList";
import EmployeeSalary from "@/components/Dashboard/HRM/EmployeeSalary";
import EmployeeWorkFormat from "@/components/Dashboard/HRM/EmployeeWorkFormat";
import NewEmployees from "@/components/Dashboard/HRM/NewEmployees";
import ResignedEmployees from "@/components/Dashboard/HRM/ResignedEmployees";
import TotalEmployees from "@/components/Dashboard/HRM/TotalEmployees";
import Welcome from "@/components/Dashboard/HRM/Welcome";
import { Row, Col } from "react-bootstrap";

export default function Page() {
  return (
    <>
      <Welcome />

      <Row className="justify-content-center">
        <Col xs={12} sm={12} md={6} lg={4}>
          <TotalEmployees />
        </Col>

        <Col xs={12} sm={12} md={6} lg={4}>
          <ResignedEmployees />
        </Col>

        <Col xs={12} sm={12} md={6} lg={4}>
          <NewEmployees />
        </Col>
      </Row>

      <Row>
        <Col xs={12} lg={12} xl={8}>
          <EmployeeAttendanceTrends />
        </Col>

        <Col xs={12} lg={12} xl={4}>
          <EmployeeWorkFormat />
        </Col>
      </Row>

      <Row>
        <Col xs={12} lg={12} xl={12} xxl={4}>
          <EmployeeSalary />
        </Col>

        <Col xs={12} lg={12} xl={12} xxl={8}>
          <EmployeeLeaveRequest />
        </Col>
      </Row>

      <EmployeeList />
    </>
  );
}
