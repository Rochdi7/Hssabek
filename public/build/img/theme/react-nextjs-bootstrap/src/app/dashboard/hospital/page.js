import { Row, Col } from "react-bootstrap";
import Welcome from "@/components/Dashboard/Hospital/Welcome";
import OverallVisitors from "@/components/Dashboard/Hospital/OverallVisitors";
import PatientsLast7Days from "@/components/Dashboard/Hospital/PatientsLast7Days";
import PatientAdmissionsDischarges from "@/components/Dashboard/Hospital/PatientAdmissionsDischarges";
import EmergencyRoomVisits from "@/components/Dashboard/Hospital/EmergencyRoomVisits";
import CriticalPatients from "@/components/Dashboard/Hospital/CriticalPatients";
import BedOccupancyRate from "@/components/Dashboard/Hospital/BedOccupancyRate";
import PatientAppointments from "@/components/Dashboard/Hospital/PatientAppointments";
import ScheduleAppointment from "@/components/Dashboard/Hospital/ScheduleAppointment";
import PatientByAge from "@/components/Dashboard/Hospital/PatientByAge";
import HospitalEarnings from "@/components/Dashboard/Hospital/HospitalEarnings";

export default function Page() {
  return (
    <>
      <Row>
        <Col xs={12} sm={12} md={12} lg={12} xl={6} xxl={5}>
          <Welcome />

          <Row>
            <Col xs={12} sm={6}>
              <OverallVisitors />
            </Col>

            <Col xs={12} sm={6}>
              <PatientsLast7Days />
            </Col>
          </Row>
        </Col>

        <Col xs={12} sm={12} md={12} lg={12} xl={6} xxl={7}>
          <PatientAdmissionsDischarges />
        </Col>
      </Row>

      <Row>
        <Col xs={12} sm={12} md={12} lg={12} xl={12} xxl={5}>
          <EmergencyRoomVisits />
        </Col>

        <Col xs={12} sm={12} md={12} lg={4} xl={4} xxl={2}>
          <CriticalPatients />
        </Col>

        <Col xs={12} sm={12} md={12} lg={8} xl={8} xxl={5}>
          <BedOccupancyRate />
        </Col>
      </Row>

      <Row>
        <Col xs={12} sm={12} md={12} lg={7} xl={8}>
          <PatientAppointments />
        </Col>

        <Col xs={12} sm={12} md={12} lg={5} xl={4}>
          <ScheduleAppointment />
        </Col>
      </Row>

      <Row>
        <Col xs={12} sm={12} md={12} lg={12} xl={5} xxl={4}>
          <PatientByAge />
        </Col>

        <Col xs={12} sm={12} md={12} lg={12} xl={7} xxl={8}>
          <HospitalEarnings />
        </Col>
      </Row>
    </>
  );
}
